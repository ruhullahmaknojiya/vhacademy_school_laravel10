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
    $userby = Auth::user();
    $School = School::where('user_id', $userby->id)->first();

    // Retrieve unique teachers
    $teachers = TeacherTimetable::where('school_id', $School->id)
                 ->select('teacher_id')
                 ->distinct()
                 ->with('teacher') // Assuming you have a relationship defined in the TeacherTimetable model
                 ->get()
                 ->pluck('teacher')
                 ->unique('id'); // Ensure uniqueness

    return view('schooladmin.teachertimetable.index', compact('teachers'));
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


   public function edit($teacherId) {
    $userby = Auth::user();
    $School = School::where('user_id', $userby->id)->first();

    // Find the teacher by ID
    $teacher = Teacher::find($teacherId);
    if (!$teacher) {
        return redirect()->back()->with('error', 'Teacher not found');
    }

    // Get all timetable entries for the teacher
    $timetables = TeacherTimetable::where('teacher_id', $teacherId)
            ->with(['medium', 'standard', 'classmodel', 'subject'])
            ->orderBy('day')
            ->orderBy('start_time') // Order by time directly in the query
            ->get()
            ->groupBy('day');

    // Debugging: Check the raw timetables data
    \Log::info('Timetables:', $timetables->toArray());

    // Days of the week for the dropdown
    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    return view('schooladmin.teachertimetable.edit', compact('teacher', 'timetables', 'daysOfWeek'));
}
    
    public function show($teacherId) {
        $userby = Auth::user();
        $School = School::where('user_id', $userby->id)->first();

        // Find the teacher by ID
        $teacher = Teacher::find($teacherId);
        if (!$teacher) {
            return redirect()->back()->with('error', 'Teacher not found');
        }

        // Get all timetable entries for the teacher, grouped by day and ordered by day of the week
        $timetables = TeacherTimetable::where('teacher_id', $teacherId)
                ->with(['medium', 'standard', 'classmodel', 'subject'])
                ->get()
                ->sortBy(function($timetable) {
                    // Custom sort function to order by day of the week
                    $days = ['Monday' => 1, 'Tuesday' => 2, 'Wednesday' => 3, 'Thursday' => 4, 'Friday' => 5, 'Saturday' => 6, 'Sunday' => 7];
                    return $days[$timetable->day];
                })
                ->groupBy(function($timetable) {
                    return $timetable->medium->medium_name . '-' . $timetable->standard->standard_name;
                });

            return view('schooladmin.teachertimetable.show', compact('teacher', 'timetables'));
        }
    
    public function update(Request $request,$id){
                //  dd($request->all());
                $validate = $request->validate([
                    'teacher_id' => 'required',
                    'medium_id' => 'required',
                    'standard_id' => 'required',
                    'class_id' => 'required',
                    'day' => 'required',
                    'subject_id' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                ], [
                    'teacher_id.required' => 'The Teacher Name is required.',
                    'medium_id.required' => 'The Medium is required.',
                    'standard_id.required' => 'The Standard is required.',
                    'class_id.required' => 'The Class is required.',
                    'day.required' => 'The Day is required.',
                    'subject_id.required' => 'The Subject is required.',
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
                $save_timetable->standard_id=$request->standard_id;
                $save_timetable->class_id=$request->class_id;
                $save_timetable->day=$request->day;
                $save_timetable->subject_id=$request->subject_id;
                $save_timetable->start_time=$request->start_time;
                $save_timetable->end_time=$request->end_time;
                $save_timetable->school_id=$School->id;

                // Handle PDF file upload


                $save_timetable->save();
                return redirect()->route('teacher.timetable.index')->with('success','Timetable Update Scuccessfully');
    }
    public function destroy($id)
    {
         $timetable=TeacherTimetable::find($id);
        if ($timetable) {
        $timetable->delete();
        session()->flash('danger', 'Teacher Timetable Deleted Successfully');
        } else {
            session()->flash('error', 'Timetable not found');
        }

        // Stay on the same page
        return redirect()->back();
        // $delete_timetable->delete();
        // return redirect()->route('teacher.timetable.index')->with('danger','Teacher Timetable Delete Successfully');
    }
    
    public function generatePDF($id) {
    $userby = Auth::user();
    $School = School::where('user_id', $userby->id)->first();

    $teacher = Teacher::find($id);
    if (!$teacher) {
        return redirect()->back()->with('error', 'Teacher not found');
    }

    $timetables = TeacherTimetable::where('teacher_id', $teacher->id)
                    ->with(['medium', 'standard', 'classmodel', 'subject'])
                    ->orderBy('day')
                    ->get()
                    ->groupBy('day');

    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

    $pdf = PDF::loadView('schooladmin.teachertimetable.pdf', compact('teacher', 'timetables', 'daysOfWeek'));
    return $pdf->download('timetable.pdf');
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
