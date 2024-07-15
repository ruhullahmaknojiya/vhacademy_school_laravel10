<?php

namespace App\Http\Controllers\School\Attendence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Student;



class AttendenceController extends Controller
{
    public function attendanceReport(Request $request)
{
    $query = Attendance::with('student.medium', 'student.standard', 'student.class')
                        ->when($request->medium, function ($q) use ($request) {
                            $q->whereHas('student', function ($q) use ($request) {
                                $q->where('medium_id', $request->medium);
                            });
                        })
                        ->when($request->standard, function ($q) use ($request) {
                            $q->whereHas('student', function ($q) use ($request) {
                                $q->where('class_id', $request->standard);
                            });
                        })
                        ->when($request->class, function ($q) use ($request) {
                            $q->whereHas('student', function ($q) use ($request) {
                                $q->where('section_id', $request->class);
                            });
                        })
                        ->when($request->date, function ($q) use ($request) {
                            $q->where('attendance_date', $request->date);
                        });

    $attendances = $query->paginate(10);

    $mediums = Medium::all();
    $standards = Standard::all();
    $classes = ClassModel::all();

    return view('schooladmin.attendence.attendance_report', compact('attendances', 'mediums', 'standards', 'classes'));
}
}
