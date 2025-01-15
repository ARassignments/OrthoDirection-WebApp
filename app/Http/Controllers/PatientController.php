<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard()
    {
        return view('patient.dashboard');
    }
    public function contact_store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'status' => false,
                'IsLogin' => false,
                'error' => "Access Denied: Please log in to your account to continue"
            ]);
        }
    
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
            $contact->user_id = Auth::user()->id;
            $contact->name = $request->fname . ' ' . $request->lname;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone = $request->phone;
            $contact->comment = $request->comment;
            $contact->save();
    
            return response()->json([
                'status' => true,
                'msg' => 'Thank you! Your message has been successfully sent. We will get back to you shortly.'
            ]);
        }
    
        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }
    
}