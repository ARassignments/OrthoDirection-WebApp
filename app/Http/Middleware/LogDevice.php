<?php

namespace App\Http\Middleware;

use App\Models\DeviceLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class LogDevice
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $agent = new Agent();
            $deviceName = $agent->device();
            $browser = $agent->browser();
            $platform = $agent->platform();
            $ip = $request->ip();

            DeviceLog::updateOrCreate(
                [
                    'user_id' => Auth::user()->id,
                    'ip_address' => $ip,
                ],
                [
                    'device_name' => $deviceName,
                    'browser' => $browser,
                    'platform' => $platform,
                    'logged_in_at' => now(),
                ]
            );
        }

        return $next($request);
    }
}
