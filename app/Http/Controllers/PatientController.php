<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\Contact;
use App\Models\User;
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
                }
            ])
            ->findOrFail($id);
        if (!$doctor) {
            return response()->json(['error' => 'Doctor not found!'], 404);
        }
        return view('patient.doctors.doctor-detail', compact(['doctor' => 'doctor']));
    }
}
