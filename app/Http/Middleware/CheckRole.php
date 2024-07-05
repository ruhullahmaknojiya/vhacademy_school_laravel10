<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
         // Log authenticated user role and the role parameter
         \Log::info('Authenticated user role: ' . Auth::user()->role);
         \Log::info('Role parameter passed to middleware: ' . $role);


        // Check if the authenticated user's role name matches the required role
        if (strtolower(Auth::user()->role->name) !== strtolower($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
        // if (Auth::check() || Auth::user()->role_id == $role) {
        //      dd($role);
        //     return $next($request);

        // }else{
        //     abort(403, 'Unauthorized action.');

        // }

    }


}
