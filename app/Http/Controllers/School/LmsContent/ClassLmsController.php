<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class ClassLmsController extends Controller
{
       // Class CRUD
       public function index()
       {
            if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }
           $classes = ClassModel::paginate(10);

           return view('schooladmin.educational.class.index', compact('classes'));
       }
}
