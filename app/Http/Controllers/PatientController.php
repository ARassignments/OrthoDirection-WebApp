<?php

namespace App\Http\Controllers;
use App\Models\AdminProfile;
use App\Models\Contact;
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
            $contact->fname = $request->fname ;
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
        return view('patient.profile.edit-profile', compact('profile'));
    }
    public function getProfileDetails()
    {
        $profile = AdminProfile::where('user_id', Auth::id())->first();
        return view('patient.profile.profile', compact('profile'));
    }
    
}