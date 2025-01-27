<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {

        $schools = School::all();

        $school = $request->input('school');
        $medium = $request->input('medium');
        $teacher = $request->input('teacher');

        $teachers = Teacher::query();


        if ($request->has('school') && $request->school != '') {
            $teachers->where('school_id', $request->school);
        }
        if ($request->has('medium') && $request->medium != '') {
            $teachers->where('medium_id', $request->medium);
        }

        if ($request->has('teacher') && $request->teacher != '') {
            $teachers->where('id', $request->teacher);
        }



        $teachers = $teachers->with('school', 'medium')->orderBy('id','desc')->paginate(10);
        return view('superadmin.teachers.index', compact('schools', 'teachers'));
    }
}
