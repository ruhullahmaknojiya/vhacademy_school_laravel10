<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role->name == 'SuperAdmin') {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->role->name == 'SchoolAdmin') {
            return redirect()->route('schooladmin.dashboard');
        }

        return view('home'); // Default view if role doesn't match
    }
}
