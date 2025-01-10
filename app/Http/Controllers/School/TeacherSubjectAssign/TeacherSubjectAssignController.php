<?php

namespace App\Http\Controllers\School\TeacherSubjectAssign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Standard;
use App\Models\Teacher;
use App\Models\TeacherSubjectAssign;
use App\Models\Medium;
use App\Models\School;
use Illuminate\Support\Facades\Auth;


class TeacherSubjectAssignController extends Controller
{
    public function index()
    {
        $authUser = Auth::user()->id;
        $school = School::where('user_id', $authUser)->first();
        $teachers = Teacher::where('school_id', $school->id)->get();
        $mediums = Medium::all();
        $standards = Standard::all();
        $subjects = Subject::all();
        $assignments = TeacherSubjectAssign::with(['teacher', 'subject', 'school', 'medium', 'standard'])
            ->where('school_id', $school->id)
            ->get()
            ->groupBy(['medium_id', 'standard_id', 'subject_id']);

        return view('schooladmin.teacher_subject_assign.index', compact('teachers', 'mediums', 'standards', 'subjects', 'assignments', 'school'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'subjects' => 'required|array',
            'subjects.*' => 'exists:subjects,id',
            'school_id' => 'required|exists:schools,id',
            'medium_id' => 'required|exists:mediums,id',
            'standard_id' => 'required|exists:standards,id',
        ]);

        foreach ($validatedData['subjects'] as $subjectId) {
            TeacherSubjectAssign::create([
                'teacher_id' => $validatedData['teacher_id'],
                'subject_id' => $subjectId,
                'school_id' => $validatedData['school_id'],
                'medium_id' => $validatedData['medium_id'],
                'standard_id' => $validatedData['standard_id'],
            ]);
        }

        return redirect()->route('subjectteacherassignments.index')->with('success', 'Subjects assigned successfully.');
    }

    public function getStandards($medium_id)
    {
        $standards = Standard::where('medium_id', $medium_id)->get();
        return response()->json($standards);
    }

    public function getTeacherSubjects($standard_id)
    {
        $subjects = Subject::where('std_id', $standard_id)->get();
        return response()->json($subjects);
    }

    public function destroy($id)
    {
        TeacherSubjectAssign::find($id)->delete();
        return redirect()->route('subjectteacherassignments.index')->with('success', 'Remove successfully.');
    }
}
