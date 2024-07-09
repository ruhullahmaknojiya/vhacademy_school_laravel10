<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
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
        $timetables=TeacherTimetable::all();
        return view('schooladmin.teachertimetable.index',compact('timetables'));
    }

    public function create()
    {
        $userby=Auth::user();
        $teachers=Teacher::with('user')->where('user_id', $userby->school_id)->get();
        $classes=ClassModel::all();


        $mediums=Medium::all();
        return view('schooladmin.teachertimetable.create',compact('mediums','classes','teachers','days'));
    }



    public function store(Request $request)
    {
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
        // Create a new Subtopic instance
        $save_timetable=new TeacherTimetable();
        $save_timetable->teacher_id=$request->teacher_id;
        $save_timetable->medium_id=$request->medium_id;
        $save_timetable->standard_id=$request->std_id;
        $save_timetable->class_id=$request->class_id;
        $save_timetable->day_id=$request->day_id;
        $save_timetable->subject_id=$request->subject_id;
        $save_timetable->date=$request->date;
        $save_timetable->start_time=$request->start_time;
        $save_timetable->end_time=$request->end_time;
        $save_timetable->school_id=$userby->id;

        // Handle PDF file upload


        $save_timetable->save();


        return redirect()->route('teacher_timetable')->with('success','SubTopic Add Scuccessfully');
    }
    public function edit($id){
        $timetable=TeacherTimetable::find($id);
        $userby=Auth::user();
        $mediums=Medium::all();
        $standard=Standard::all();
        $subjects=Subject::all();
        $teachers=Teacher::with('user')->where('school_id', $userby->school_id)->get();
        $classes=ClassModel::all();
        return view('schooladmin.teachertimetable.edit',compact('mediums','classes','teachers','days','standard','subjects','timetable'));


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
                $save_timetable->school_id=$userby->id;

                // Handle PDF file upload


                $save_timetable->save();
                return redirect()->route('teacher_timetable_index')->with('success','Timetable Update Scuccessfully');
    }
    public function destroy($id)
    {
        $delete_timetable=TeacherTimetable::find($id);
        $delete_timetable->delete();
        return redirect()->route('teacher_timetable_index')->with('danger','Teacher Timetable Delete Successfully');
    }
}
