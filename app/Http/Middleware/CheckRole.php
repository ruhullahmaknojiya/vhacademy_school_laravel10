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
            return redirect()->route('login');
        }

        // Log authenticated user role and the role parameter
        Log::info('Authenticated user role: ' . Auth::user()->role->name);
        Log::info('Role parameter passed to middleware: ' . $role);

        // Check if the authenticated user's role name matches the required role
        if (strtolower(Auth::user()->role->name) !== strtolower($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }


}
