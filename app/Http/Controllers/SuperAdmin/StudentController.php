<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use App\Models\School;
use App\Models\Standard;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all schools for the dropdown
        $schools = School::all();
        $students = Student::query();
        if ($request->has('school') && $request->school != '') {
            $students->where('school_id', $request->school);
        }
        if ($request->has('medium') && $request->medium != '') {
            $students->where('medium_id', $request->medium);
        }
        if ($request->has('standard') && $request->standard != '') {
            $students->where('class_id', $request->standard);
        }

        if ($request->has('student') && $request->student != '') {
            $students->where('id', $request->student);
        }

        $students = $students->with('school', 'medium', 'standard')->latest()->paginate(10);

        // Fetch related data for cascading dropdowns
        $mediums = $request->school ? Medium::where('school_id', $request->school)->get() : [];
        $standards = $request->medium ? Standard::where('medium_id', $request->medium)->get() : [];

        return view('superadmin.students.index', compact('schools', 'mediums', 'standards', 'students'));
    }








    public function getMediums($schoolId)
    {
        $mediums = Medium::where('school_id', $schoolId)->get();
        return response()->json($mediums);
    }

    public function getStandards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->get();
        return response()->json($standards);
    }

    public function getStudents($standardId)
    {
        $student = Student::where('class_id', $standardId)->paginate(10);
        return response()->json($student);
    }
}
