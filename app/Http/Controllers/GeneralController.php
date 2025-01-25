<?php

namespace App\Http\Controllers;

use App\Models\AdminProfile;
use App\Models\DeviceLog;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class GeneralController extends Controller
{

    // Profile
    public function profileUpload(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:255',
            'gender' => ['nullable', Rule::in(['male', 'female'])],
            'country' => 'nullable|string|max:50',
            'city' => 'nullable|string|max:50',
            'contact' => 'nullable|string|max:15|min:11',
            'date_of_birth' => 'nullable|date|before_or_equal:today',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'age' => 'nullable|integer|min:18|max:70',
            'address' => 'nullable|string|max:255',
            'status' => 'nullable|boolean'
        ]);

        $profile = AdminProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'bio' => $request->bio,
                'gender' => $request->gender,
                'country' => $request->country,
                'city' => $request->city,
                'contact' => $request->contact,
                'date_of_birth' => $request->date_of_birth,
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'twitter' => $request->twitter,
                'age' => $request->age,
                'address' => $request->address,
                'status' => $request->status ? 1 : 0,
            ]
        );

        if ($request->hasFile('profile_img')) {
            if ($profile->profile_img && File::exists(public_path('profile_images/' . $profile->profile_img))) {
                File::delete(public_path('profile_images/' . $profile->profile_img));
            }
            $file = $request->file('profile_img');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('profile_images'), $filename);
            $profile->update(['profile_img' => $filename]);
        }

        return response()->json(['success' => 'Profile saved successfully!']);
    }

    public function getProfile()
    {
        $profile = AdminProfile::where('user_id', Auth::id())->first();
        return view('general.profile.edit-profile', compact('profile'));
    }
    public function getProfileDetails()
    {
        $profile = AdminProfile::where('user_id', Auth::id())->first();
        return view('general.profile.profile', compact('profile'));
    }

    // Device Logs

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
