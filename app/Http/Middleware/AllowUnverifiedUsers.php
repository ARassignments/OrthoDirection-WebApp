<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowUnverifiedUsers
{
    public function handle(Request $request, Closure $next)
    {
        // Check if there's a session entry for a recently registered user
        if (session()->has('registered_email')) {
            return $next($request);
        }

        // Redirect all other users to the login page
        return redirect()->route('login');
    }
}

