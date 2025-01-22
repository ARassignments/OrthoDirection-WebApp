<?php

namespace App\Http\Controllers;

use App\Models\DeviceLog;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function ignoreTracking(Request $request)
    {
        $request->validate([
            'ignore_tracking' => 'required|boolean',
        ]);

        if ($request->ignore_tracking) {
            Session::put('ignore_tracking', true);
        } else {
            Session::forget('ignore_tracking');
        }

        return response()->json([
            'success' => true,
            'message' => $request->ignore_tracking ? 'Tracking has been ignored.' : 'Tracking enabled.',
        ]);
    }

    public function updateNotification(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:newsletter,email_notification',
            'status' => 'required|boolean',
        ]);

        $user = User::find(Auth::user()->id);
        
        if ($request->type === 'newsletter') {
            $user->newsletter = $request->status;
        } elseif ($request->type === 'email_notification') {
            $user->email_notification = $request->status;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Notification preferences updated successfully.',
        ]);
    }
}
