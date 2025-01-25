<?php

namespace App\Http\Controllers;

use App\Models\DoctorWorkingTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
