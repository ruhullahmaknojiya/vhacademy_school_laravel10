<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    
    protected function redirectTo($request)
    {

      // Check if the user is authenticated
        if (!Auth::check()) {
            // Log out the user if not authenticated
            Auth::logout();

            // Invalidate the session
            session()->invalidate();

            // Redirect to login page
            return redirect('/login')->with('message', 'Your session has expired. Please login again.');
        }

        return $next($request);
    }
}
