<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\DoctorWorkingTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\AppointmentCancelled;
use App\Notifications\AppointmentNotification;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('doctor.dashboard');
    }

    public function slotFetch()
    {
        $workingTimes = DoctorWorkingTime::where('doctor_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return response()->json($workingTimes);
    }

    public function slotStore(Request $request)
    {
        $request->validate([
            'available_time' => 'required|date_format:H:i',
        ]);

        $workingTimes = new DoctorWorkingTime();
        $workingTimes->doctor_id = Auth::user()->id;
        $workingTimes->available_time = $request->available_time;
        $workingTimes->save();

        return response()->json(['success' => 'Time Slot Added Successfully!']);
    }

    public function slotUpdate(Request $request, $id)
    {
        $request->validate([
            'available_time' => 'required|date_format:H:i',
        ]);

        $workingTime = DoctorWorkingTime::findOrFail($id);
        $workingTime->update($request->all());

        return response()->json(['success' => 'Time Slot Updated Successfully!']);
    }

    public function slotDestroy($id)
    {
        DoctorWorkingTime::findOrFail($id)->delete();

        return response()->json(['success' => 'Time Slot Deleted Successfully!']);
    }

    public function slotStatusUpdate(Request $request, $id)
    {
        $workingTime = DoctorWorkingTime::findOrFail($id);
        $workingTime->status = $request->status;
        $workingTime->save();

        return response()->json(['success' => 'Slot Status Updated Successfully!']);
    }

    // Appointments
    public function appointmentFetch()
    {
        $doctorId = Auth::user()->id;

        $doctor = Appointment::where('doctor_id', $doctorId)
            // ->where('status', '!=', 'cancelled')
            ->with([
                'patient' => function ($query) {
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

    public function appointmentFetchToday()
    {
        $doctorId = Auth::user()->id;

        $doctor = Appointment::where('doctor_id', $doctorId)
            ->whereDate('created_at', Carbon::today())
            ->with([
                'patient' => function ($query) {
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
            'doctor_cancellation_reason' => 'required|string|max:255',
        ]);
        $appointment = Appointment::find($id);
        if ($appointment->status == 'cancelled') {
            return response()->json(['error' => 'This appointment is already cancelled.']);
        }

        $appointment->update([
            'status' => 'cancelled',
            'doctor_cancellation_reason' => $request->doctor_cancellation_reason
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

    public function appointmentStatusUpdate(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $appointment->update([
            'status' => $request->appointment_status
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

        return response()->json(['success' => 'Appointment updated successfully.']);
    }

    public function patientAppointmentFetch($id)
    {
        $doctorId = Auth::user()->id;

        $doctor = Appointment::where('doctor_id', $doctorId)
            ->where('patient_id', $id)
            ->select('id', 'doctor_id', 'treatment_type', 'user_cancellation_reason', 'doctor_cancellation_reason', 'user_cancelled', 'patient_id', 'date', 'slot', 'status')
            ->orderBy('created_at', 'desc')
            ->get();
        return datatables()->of($doctor)->make(true);
    }

    // Patients
    public function patientFetch(Request $request)
    {
        $query = User::where('role', 'patient')
            ->whereHas('adminProfile', function ($query) {
                $query->where('status', 1);
            });

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $patients = $query->with([
            'adminProfile' => function ($query) {
                $query->where('status', 1);
            },
            'familyMembers' => function ($query) {
                $query->with('adminProfile')->whereHas('adminProfile', function ($q) {
                    $q->where('status', 1);
                });
            }
        ])->get();

        return response()->json($patients);
    }

    public function patientDetail($id)
    {
        $patient = User::where('role', 'patient')
            ->with([
                'adminProfile',
                'patientAppointments' => function ($query) use ($id) {
                    $query->where('doctor_id', Auth::user()->id)
                        ->where('patient_id', $id)
                        ->select('doctor_id', 'patient_id', 'date', 'slot', 'status');
                }
            ])
            ->findOrFail($id);

        if (!$patient) {
            return response()->json(['error' => 'Patient not found!']);
        }

        return view('doctor.patients.patients-detail', [
            'patient' => $patient,
            'appointments' => $patient->patientAppointments
        ]);
    }

    public function familyMemberPatientFetch(Request $request, $familyId)
    {
        $patient = User::with([
            'patients' => function ($query) {
                $query->whereHas('adminProfile', function ($q) {
                    $q->where('status', 1);
                })->with('adminProfile');
            }
        ])->findOrFail($familyId);

        if ($request->has('search') && !empty($request->search)) {
            $filteredFamilyMembers = $patient->patients->filter(function ($patients) use ($request) {
                return stripos($patients->name, $request->search) !== false;
            })->values();

            return response()->json($filteredFamilyMembers);
        }

        return response()->json($patient->patients);
    }

    // Family
    public function patientFamilyMemberFetch(Request $request, $patientId)
    {
        $patient = User::with([
            'familyMembers' => function ($query) {
                $query->whereHas('adminProfile', function ($q) {
                    $q->where('status', 1);
                })->with('adminProfile');
            }
        ])->findOrFail($patientId);

        if ($request->has('search') && !empty($request->search)) {
            $filteredFamilyMembers = $patient->familyMembers->filter(function ($familyMember) use ($request) {
                return stripos($familyMember->name, $request->search) !== false;
            })->values();

            return response()->json($filteredFamilyMembers);
        }

        return response()->json($patient->familyMembers);
    }
    public function familyMemberFetchAll(Request $request)
    {
        $query = User::where('role', 'family')
            ->whereHas('adminProfile', function ($query) {
                $query->where('status', 1);
            });

        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $patients = $query->with([
            'adminProfile' => function ($query) {
                $query->where('status', 1);
            },
            'patients'
        ])->get();

        return response()->json($patients);
    }

    public function familyDetail($id)
    {
        $family = User::where('role', 'family')
            ->with([
                'adminProfile'
            ])
            ->findOrFail($id);

        if (!$family) {
            return response()->json(['error' => 'Family Member not found!']);
        }

        return view('doctor.family.family-detail', [
            'family' => $family
        ]);
    }
}
