<?php

namespace App\Http\Controllers\School\Homework;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Homework;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\School;

use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $school = School::where('user_id', $user->id)->first();


        $homeworks = Homework::where('school_id', $school->id);

        if ($request->has('medium_id')) {
            $homeworks->where('medium_id', $request->medium_id);
        }
        if ($request->has('standard_id')) {
           $homeworks->where('standard_id', $request->standard_id);
        }
        if ($request->has('class_id')) {
            $homeworks->where('class_id', $request->class_id);
        }
        if ($request->has('subject_id')) {
            $homeworks->where('subject_id', $request->subject_id);
        }
        if ($request->has('date')) {
            $homeworks->whereDate('date', $request->date);
        }

        $homeworks = $homeworks->paginate(10);;

        $mediums = Medium::all();
        $standards = Standard::all();
        $classes = ClassModel::all();
        $subjects = Subject::all();
        return view('schooladmin.homework.index', compact('homeworks', 'mediums', 'standards', 'classes', 'subjects'));
    }

    public function show($id)
    {
        $homework = Homework::findOrFail($id);

        return view('schooladmin.homework.show', compact('homework'));
    }
}
