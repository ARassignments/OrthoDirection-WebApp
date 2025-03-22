<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class FamilyController extends Controller
{
    public function dashboard()
    {
        return view('family.dashboard');
    }

    public function appointmentFetch()
    {
        $familyId = Auth::user()->id;
        $familyMember = User::with([
            'patients' => function ($query) {
                $query->whereHas('adminProfile', function ($q) {
                    $q->where('status', 1);
                })->with('adminProfile');
            }
        ])->findOrFail($familyId);
        $patientIds = $familyMember->patients->pluck('id');
        $appointments = Appointment::whereIn('patient_id', $patientIds)
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

        return datatables()->of($appointments)->make(true);
    }
}
