<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {


        if (Auth::check() || Auth::user()->role_id == 1) {

            return $next($request);

        }else{
            abort(403, 'Unauthorized action.');

        }

    }


}
