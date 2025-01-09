<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid email or password.']);
        }

        // Generate OTP
        $otp = random_int(1000, 9999);
        $user->otp_code = $otp;
        $user->save();

        // Send OTP to the user's email
        Mail::raw("Your OTP code is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Login OTP');
        });

        session()->put('email', $user->email);

        return redirect()->route('otp.verify');
    }

    public function showOtpForm(): View
    {
        return view('auth.verify-otp');
    }

    /**
     * Step 2: Verify OTP and log in the user.
     */
    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => 'required|digits:4', // 4-digit string validation
        ]);        
    
        $email = session('email');
        $user = User::where('email', $email)->first();
    
        if (!$user || $user->otp_code !== $request->otp) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

    
        // Clear OTP after successful login
        $user->otp_code = null;
        $user->save();
    
        // Log the user in
        Auth::login($user);
    
        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'patient') {
            return redirect()->route('patient.dashboard');
        } elseif ($user->role === 'doctor') {
            return redirect()->route('doctor.dahboard');
        }elseif ($user->role === 'family') {
            return redirect()->route('family.dahboard');
        }
    
        return redirect('/');
    }
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
