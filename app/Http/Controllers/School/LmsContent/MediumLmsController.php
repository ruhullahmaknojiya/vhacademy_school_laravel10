<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medium;
use Illuminate\Support\Facades\Auth;

class MediumLmsController extends Controller
{
    public function index()
    {
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }
        $mediums = Medium::paginate(10); // Adjust the number as needed
        return view('schooladmin.educational.medium.index', compact('mediums'));

    }




}
