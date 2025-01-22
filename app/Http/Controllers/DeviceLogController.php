<?php

namespace App\Http\Controllers;

use App\Models\DeviceLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceLogController extends Controller
{
    public function getDevices()
    {
        $devices = DeviceLog::where('user_id', Auth::id())->latest()->get();
        return response()->json($devices);
    }

    public function logoutDevice($id)
    {
        $device = DeviceLog::findOrFail($id);
        $device->update(['logged_out_at' => now()]);
        return response()->json(['message' => 'Device logged out successfully.']);
    }

    public function logoutAllDevices()
    {
        DeviceLog::where('user_id', Auth::id())->update(['logged_out_at' => now()]);
        Auth::logout();
        return response()->json(['message' => 'You have been logged out from all devices.']);
    }
}
