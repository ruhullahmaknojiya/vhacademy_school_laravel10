<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medium;

class MediumLmsController extends Controller
{
    public function index()
    {
        $mediums = Medium::paginate(10); // Adjust the number as needed
        return view('schooladmin.educational.medium.index', compact('mediums'));

    }




}
