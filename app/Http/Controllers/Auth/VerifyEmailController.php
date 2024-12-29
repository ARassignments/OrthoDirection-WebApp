<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
           
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if(Auth::user()->role == 'admin')
        {
            return redirect('admin/dashboard');
        }
        else if(Auth::user()->role == 'patients')
        {
            return redirect('/');
        }
        else if(Auth::user()->role == 'professionals')
        {
            return redirect('professionals/dashboard');
        }
            return redirect('/');
        // return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
