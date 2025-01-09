<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
         // Check if user is authenticated
         if (!Auth::check()) {
            return redirect('/login');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if user role matches the required role
        if ($user->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
