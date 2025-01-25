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
    
}