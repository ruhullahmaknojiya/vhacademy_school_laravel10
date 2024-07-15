<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    // public function handle($request, Closure $next, ...$guards)
    // {

    //     if (! Auth::check()) {
    //         return route('login');
    //     }
    //      // Check if the session has expired
    //     $sessionExpiration = strtotime(auth()->user()->last_logged_in) + config('session.lifetime') * 60;
    //     if (time() > $sessionExpiration) {
    //         Auth::logout(); // Logout the user if the session has expired
    //         return route('/');
    //     }

    //     return null;

    //     // if (Auth::guard('web')->check()) {
    //     //     return $next($request);
    //     // }

    //     // return redirect()->route('/login');
    // }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

        if (! Auth::check()) {
            return route('login');
        }
         // Check if the session has expired
        $sessionExpiration = strtotime(auth()->user()->last_logged_in) + config('session.lifetime') * 60;
        if (time() > $sessionExpiration) {
            Auth::logout(); // Logout the user if the session has expired
            return route('/');
        }

        return null;
    }
}
