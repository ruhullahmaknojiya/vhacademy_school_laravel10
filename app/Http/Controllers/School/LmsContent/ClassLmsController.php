<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;

class ClassLmsController extends Controller
{
       // Class CRUD
       public function index()
       {
           $classes = ClassModel::paginate(10);

           return view('schooladmin.educational.class.index', compact('classes'));
       }
}
