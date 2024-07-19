<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\School;
use Illuminate\Http\Request;
use App\Models\Medium;

use App\Models\Teacher;


use App\Models\TeacherTimetable;
use App\Models\Standard;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class TeacherTimeController extends Controller
{
    public function index(){
        $userby=Auth::user();

        $School=School::where('user_id', $userby->id)->first();

        $timetables=TeacherTimetable::where('school_id',$School->id)->get();
        return view('schooladmin.teachertimetable.index',compact('timetables'));
    }

    public function create()
    {
        $userby=Auth::user();

        $School=School::where('user_id', $userby->id)->first();

        $teachers=Teacher::where('school_id', $School->id)->get();

        $classes=ClassModel::all();
        $subjects = Subject::all();
        $mediums=Medium::all();
        $standards=Standard::all();

        return view('schooladmin.teachertimetable.create',compact('mediums','standards','classes','subjects','teachers'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'medium_id.*' => 'required|exists:mediums,id',
            'standard_id.*' => 'required|exists:standards,id',
            'subject_id.*' => 'required|exists:subjects,id',
            'day.*' => 'required|string',
            'start_time.*' => 'required',
            'end_time.*' => 'required',
            'class_id.*' => 'required|exists:classes,id',
        ], [
            'teacher_id.required' => 'The Teacher Name is required.',
            'medium_id.*.required' => 'The Medium is required.',
            'medium_id.*.exists' => 'The selected Medium is invalid.',
            'standard_id.*.required' => 'The Standard is required.',
            'standard_id.*.exists' => 'The selected Standard is invalid.',
            'subject_id.*.required' => 'The Subject is required.',
            'subject_id.*.exists' => 'The selected Subject is invalid.',
            'day.*.required' => 'The Day is required.',
            'start_time.*.required' => 'The Start Time is required.',
            'end_time.*.required' => 'The End Time is required.',
            'class_id.*.required' => 'The Class is required.',
            'class_id.*.exists' => 'The selected Class is invalid.',
        ]);

        $userby = Auth::user();
        $School = School::where('user_id', $userby->id)->first();

        foreach ($request->subject_id as $index => $subject_id) {
            TeacherTimetable::create([
                'teacher_id' => $request->teacher_id,
                'medium_id' => $request->medium_id[$index],
                'standard_id' => $request->standard_id[$index],
                'subject_id' => $subject_id,
                'day' => $request->day[$index],
                'start_time' => $request->start_time[$index],
                'end_time' => $request->end_time[$index],
                'class_id' => $request->class_id[$index],
                'school_id' => $School->id,
            ]);
        }

        return redirect()->route('teacher.timetable.index')->with('success', 'Timetable created successfully.');
    }


    public function edit($id){
        $timetable=TeacherTimetable::find($id);
        $userby=Auth::user();
        $mediums=Medium::all();
        $standard=Standard::all();
        $subjects=Subject::all();
        $teachers=Teacher::with('user')->where('school_id', $userby->school_id)->get();
        $classes=ClassModel::all();
        return view('schooladmin.teachertimetable.edit',compact('mediums','classes','teachers','standard','subjects','timetable'));


    }
    public function update(Request $request,$id){
                //  dd($request->all());
                $validate = $request->validate([
                    'teacher_id' => 'required',
                    'medium_id' => 'required',
                    'std_id' => 'required',
                    'class_id' => 'required',
                    'day_id' => 'required',
                    'subject_id' => 'required',
                    'date' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                ], [
                    'teacher_id.required' => 'The Teacher Name is required.',
                    'medium_id.required' => 'The Medium is required.',
                    'std_id.required' => 'The Standard is required.',
                    'class_id.required' => 'The Class is required.',
                    'day_id.required' => 'The Day is required.',
                    'subject_id.required' => 'The Subject is required.',
                    'date.required' => 'The Date is required.',
                    'start_time.required' => 'The Start Time is required.',
                    'end_time.required' => 'The End Time is required.',
                ]);

                // dd($request->all());
        $userby=Auth::user();

        $School=School::where('user_id', $userby->id)->first();

        // Create a new Subtopic instance
                $save_timetable=TeacherTimetable::find($id);
                $save_timetable->teacher_id=$request->teacher_id;
                $save_timetable->medium_id=$request->medium_id;
                $save_timetable->standard_id=$request->std_id;
                $save_timetable->class_id=$request->class_id;
                $save_timetable->day_id=$request->day_id;
                $save_timetable->subject_id=$request->subject_id;
                $save_timetable->date=$request->date;
                $save_timetable->start_time=$request->start_time;
                $save_timetable->end_time=$request->end_time;
                $save_timetable->school_id=$School->id;

                // Handle PDF file upload


                $save_timetable->save();
                return redirect()->route('teacher.timetable.index')->with('success','Timetable Update Scuccessfully');
    }
    public function destroy($id)
    {
        $delete_timetable=TeacherTimetable::find($id);
        $delete_timetable->delete();
        return redirect()->route('teacher.timetable.index')->with('danger','Teacher Timetable Delete Successfully');
    }
    public function standards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->pluck('standard_name', 'id');
        return response()->json($standards);
    }

    public function subjects($standardId)
    {
        $subjects = Subject::where('std_id', $standardId)->pluck('subject', 'id');
        return response()->json($subjects);
    }
}
