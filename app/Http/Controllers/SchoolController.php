<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{


    public function dashboard()
    {
        return view('schooladmin.dashboard');
    }
}
