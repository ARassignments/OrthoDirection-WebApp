<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\Appointment;
use App\Models\Contact;
use App\Models\User;
use App\Notifications\AppointmentNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.dashboard');
    }
    public function contactStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'lname' => ['required', 'min:3', 'max:15', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:30'],
            'phone' => ['required', 'regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'subject' => ['required', 'min:3', 'max:55', 'regex:/^[a-zA-Z\s]+$/'],
            'comment' => ['required', 'min:10'],
        ]);

        if ($validator->passes()) {
            $contact = new Contact();
            $contact->fname = $request->fname;
            $contact->lname = $request->lname;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->comment = $request->comment;
            $contact->save();

            return response()->json([
                'status' => true,
                'msg' => 'Thank you! Your message has been successfully sent.'
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    public function doctorFetch(Request $request)
    {
        $query = User::where('role', 'doctor')
            ->whereHas('adminProfile', function ($query) {
                $query->where('status', 1);
            })
            ->whereHas('doctorWorkingTimes', function ($query) {
                $query->where('status', 1);
            });

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $doctors = $query->with(['adminProfile' => function ($query) {
            $query->where('status', 1);
        }, 'doctorWorkingTimes' => function ($query) {
            $query->where('status', 1);
        }])->get();

        return response()->json($doctors);
    }

    public function doctorDetail($id)
    {
        $doctor = User::where('role', 'doctor')
            ->with([
                'adminProfile',
                'doctorWorkingTimes' => function ($query) {
                    $query->where('status', 1);
                },
                'doctorAppointments' => function ($query) use ($id) {
                    $query->where('doctor_id', $id)
                        ->where('patient_id', Auth::user()->id)
                        // ->where('status', '!=', 'cancelled')
                        ->select('doctor_id', 'patient_id', 'date', 'slot', 'status');
                }
            ])
            ->findOrFail($id);

        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found!'], 404);
        }

        return view('patient.doctors.doctor-detail', [
            'doctor' => $doctor,
            'appointments' => $doctor->doctorAppointments
        ]);
    }

    public function appointmentStore(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'day' => 'required|string',
            'slot' => 'required',
            'treatment_type' => 'required|string',
        ]);

        $adminProfileExists = AdminProfile::where('user_id', Auth::user()->id)
            ->where('status', 1)
            ->exists();

        if (!$adminProfileExists) {
            return response()->json(['error' => 'Your profile does not exist or is currently inactive.']);
        }

        $existingAppointment = Appointment::where('doctor_id', $request->doctor_id)
            ->where('patient_id', Auth::user()->id)
            ->where('date', $request->date)
            ->where('slot', $request->slot)
            ->exists();

        if ($existingAppointment) {
            return response()->json(['error' => 'An appointment already exists for the selected date and time.']);
        }

        $appointment = new Appointment();
        $appointment->doctor_id = $request->doctor_id;
        $appointment->patient_id = Auth::user()->id;
        $appointment->date = $request->date;
        $appointment->day = $request->day;
        $appointment->slot = $request->slot;
        $appointment->treatment_type = $request->treatment_type;
        $appointment->save();

        $patient = User::find(Auth::user()->id);
        $doctor = User::find($request->doctor_id);
        if ($patient) {
            $patient->notify(new AppointmentNotification($appointment, 'created', 'patient'));
        }
        if ($doctor) {
            $doctor->notify(new AppointmentNotification($appointment, 'created', 'doctor'));
        }
        $familyMembers = $patient->familyMembers()->whereHas('adminProfile', function ($query) {
            $query->where('status', 1);
        })->get();

        foreach ($familyMembers as $familyMember) {
            $familyMember->notify(new AppointmentNotification($appointment, 'created', 'family_member'));
        }

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new AppointmentNotification($appointment, 'created', 'admin'));
        }

        return response()->json(['success' => 'Appointment Created Successfully!']);
    }

    public function appointmentFetch()
    {
        $patientId = Auth::user()->id;

        $doctor = Appointment::where('patient_id', $patientId)
            // ->where('status', '!=', 'cancelled')
            ->with([
                'doctor' => function ($query) {
                    $query->select('id', 'name', 'email')
                        ->with([
                            'adminProfile' => function ($adminQuery) {
                                $adminQuery->select('user_id', 'profile_img');
                            }
                        ]);
                }
            ])
            ->select('id', 'doctor_id', 'treatment_type', 'user_cancellation_reason', 'doctor_cancellation_reason', 'user_cancelled', 'patient_id', 'date', 'slot', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        return datatables()->of($doctor)->make(true);
    }

    public function appointmentCancel(Request $request, $id)
    {
        $request->validate([
            'user_cancellation_reason' => 'required|string|max:255',
        ]);
        $appointment = Appointment::find($id);
        if ($appointment->status == 'cancelled') {
            return response()->json(['error' => 'This appointment is already cancelled.']);
        }

        $appointment->update([
            'status' => 'cancelled',
            'user_cancelled' => 'cancelled',
            'user_cancellation_reason' => $request->user_cancellation_reason
        ]);

        $patient = User::find($appointment->patient_id);
        $doctor = User::find($appointment->doctor_id);

        if ($patient) {
            $patient->notify(new AppointmentNotification($appointment, 'updated', 'patient'));
        }

        if ($doctor) {
            $doctor->notify(new AppointmentNotification($appointment, 'updated', 'doctor'));
        }

        $familyMembers = $patient->familyMembers()->whereHas('adminProfile', function ($query) {
            $query->where('status', 1);
        })->get();

        foreach ($familyMembers as $familyMember) {
            $familyMember->notify(new AppointmentNotification($appointment, 'updated', 'family_member'));
        }

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new AppointmentNotification($appointment, 'updated', 'admin'));
        }

        return response()->json(['success' => 'Appointment cancelled successfully.']);
    }
}
