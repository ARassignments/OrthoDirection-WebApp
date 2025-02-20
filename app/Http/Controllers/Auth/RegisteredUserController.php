<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\RateLimiter;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'roles' => ['required'],
        ]);

        $otp = random_int(1000, 9999); // Generate a 4-digit OTP

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->roles,
            'otp_code' => $otp, // Assuming 'otp_code' column exists in the users table
        ]);

        // Send OTP to user's email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Verify Your OTP');
        });

        // Save email to session for verification process
        session(['email' => $user->email]);

        return redirect()->route('register.otp.verify')->with('success', 'OTP has been sent to your email.');

        // $user->sendEmailVerificationNotification();

        // session()->invalidate();
        // session()->regenerateToken();

        // return redirect('email-verify');

    }
    public function showOtpForm(): View
    {
        return view('auth.register-verify-otp');
    }
    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'numeric'],
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->otp_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->otp_code = null; // Clear the OTP
        $user->save();

        return redirect('login')->with('success', 'Your email has been verified. Please log in to continue.');
    }

    public function resend(Request $request)
    {
        
        $email = $request->session()->get('email');
        $key = 'resend-otp-' . $email;
    
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['otp' => 'Too many attempts. Please try again later.']);
        }
    
        RateLimiter::hit($key, 60);

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Generate a new OTP
        $otp = random_int(1000, 9999);

        // Update the OTP in the database
        $user->update(['otp_code' => $otp]);

        // Resend the OTP via email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Resend OTP');
        });

        return back()->with('success', 'OTP has been resent to your email.');
    }

}
