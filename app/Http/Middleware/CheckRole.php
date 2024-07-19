<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {


        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('message', 'Your session has expired. Please login again.');
        }

        // Check for session expiration
        $lastActivity = session()->get('last_activity');
        $sessionLifetime = config('session.lifetime') * 60; // session lifetime in seconds

        if ($lastActivity && (time() - $lastActivity > $sessionLifetime)) {
            Auth::logout();
            session()->invalidate();

            return redirect('/login')->with('message', 'Your session has expired. Please login again.');
        }

        // Update last activity time
        session()->put('last_activity', time());

        // Check user role
        $user = Auth::user();

        // Check if the user or role is null
        if (!$user || !$user->role || !$user->role->name) {
            Auth::logout();
            session()->invalidate();

            return redirect('/login')->with('message', 'Your session has expired. Please login again.');
        }

        // Check if user has the required role
        if ($user->role->name !== $role) {
            return redirect('/login')->with('error', "You don't have access to this page.");
        }

        return $next($request);



    }


}
