<?php

namespace App\Http\Controllers\School\Attendence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\School;
use App\Models\Holiday;



class AttendenceController extends Controller
{
  public function attendanceReport(Request $request)
{
    $authUser = auth()->user()->id;
    $school = School::where('user_id', $authUser)->first();
    
    // Get the start and end of the current month
    $startOfMonth = now()->startOfMonth()->format('Y-m-d');
    $endOfMonth = now()->endOfMonth()->format('Y-m-d');

    if ($request->has('student_id')) {
        $student_id = $request->input('student_id');
        $student = Student::with(['medium', 'standard', 'class'])->find($student_id);

        // Get the selected month or default to the current month
        $selectedMonth = $request->input('month', now()->format('Y-m'));
        $startOfMonth = \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth()->format('Y-m-d');
        $endOfMonth = \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->endOfMonth()->format('Y-m-d');

        // Get all holidays in the selected month
        $holidays = Holiday::where('school_id', $school->id)
                            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                                $query->whereBetween('start_date', [$startOfMonth, $endOfMonth])
                                      ->orWhereBetween('end_date', [$startOfMonth, $endOfMonth]);
                            })
                            ->get();

        // Generate all dates for the selected month
        $dates = [];
        $currentDate = $startOfMonth;
        while ($currentDate <= $endOfMonth) {
            $dates[] = $currentDate;
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }

        // Get all attendance records for the selected student in the selected month
        $attendanceRecords = Attendance::with(['holiday'])
            ->where('school_id', $school->id)
            ->where('student_id', $student_id)
            ->whereBetween('attendance_date', [$startOfMonth, $endOfMonth])
            ->get()
            ->groupBy('attendance_date');

        $attendances = collect();

        // Loop through each date of the month and determine the attendance status
        foreach ($dates as $date) {
            $isSunday = (date('w', strtotime($date)) == 0);
            $isHoliday = false;
            $holidayDetail = null;

            // Check if the current date falls within any holiday period
            foreach ($holidays as $holiday) {
                if ($date >= $holiday->start_date && $date <= $holiday->end_date) {
                    $isHoliday = true;
                    $holidayDetail = $holiday;
                    break;
                }
            }

            if ($isSunday || $isHoliday) {
                $attendances->push([
                    'attendance_date' => $date,
                    'status' => 'Holiday',
                    'reason' => $isHoliday ? 'Holiday' : 'Sunday',
                    'holiday' => $holidayDetail,
                    'student' => null,
                ]);
            } elseif (isset($attendanceRecords[$date])) {
                foreach ($attendanceRecords[$date] as $attendance) {
                    $attendances->push($attendance);
                }
            } else {
                $attendances->push([
                    'attendance_date' => $date,
                    'status' => 'N/A',
                    'reason' => 'No Record',
                    'holiday' => null,
                    'student' => null,
                ]);
            }
        }

        $attendances = $attendances->sortBy('attendance_date');

        return view('schooladmin.attendence.student_attendance', compact('attendances', 'selectedMonth', 'student', 'student_id'));
    }

    // If no student is selected, return the student list view
    $students = Student::where('school_id', $school->id)
                        ->with(['medium', 'standard', 'class'])
                        ->get();

    return view('schooladmin.attendence.attendance_report', compact('students'));
}


public function show(Request $request, $student_id)
{
    $totalPresent = 0;
    $totalAbsent = 0;
    $totalHolidays = 0;
    
    $authUser = auth()->user()->id;
    $school = School::where('user_id', $authUser)->first();
    
    // Get the start and end of the selected month (default to current month)
    $selectedMonth = $request->input('month', now()->format('Y-m'));
    $startOfMonth = \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->startOfMonth()->format('Y-m-d');
    $endOfMonth = \Carbon\Carbon::createFromFormat('Y-m', $selectedMonth)->endOfMonth()->format('Y-m-d');

    // Get the student's details along with medium and standard
    $student = Student::with(['medium', 'standard', 'class'])->find($student_id);
    
    // Get all holidays in the selected month
    $holidays = Holiday::where('school_id', $school->id)
                        ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                            $query->whereBetween('start_date', [$startOfMonth, $endOfMonth])
                                  ->orWhereBetween('end_date', [$startOfMonth, $endOfMonth]);
                        })
                        ->get();

    // Generate all dates for the selected month
    $dates = [];
    $currentDate = $startOfMonth;
    while ($currentDate <= $endOfMonth) {
        $dates[] = $currentDate;
        $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
    }

    // Get all attendance records for the selected student in the selected month
    $attendanceRecords = Attendance::with(['holiday'])
        ->where('school_id', $school->id)
        ->where('student_id', $student_id)
        ->whereBetween('attendance_date', [$startOfMonth, $endOfMonth])
        ->get()
        ->groupBy('attendance_date');

    $attendances = collect();

    // Loop through each date of the month and determine the attendance status
    foreach ($dates as $date) {
        $isSunday = (date('w', strtotime($date)) == 0);
        $isHoliday = false;
        $holidayDetail = null;

        // Check if the current date falls within any holiday period
        foreach ($holidays as $holiday) {
            if ($date >= $holiday->start_date && $date <= $holiday->end_date) {
                $isHoliday = true;
                $holidayDetail = $holiday;
                $totalHolidays++;
                break;
            }
        }

        if ($isSunday || $isHoliday) {
            $attendances->push([
                'attendance_date' => $date,
                'status' => 'Holiday',
                'reason' => $isHoliday ? 'Holiday' : 'Sunday',
                'holiday' => $holidayDetail,
                'student' => null,
            ]);
        } elseif (isset($attendanceRecords[$date])) {
            foreach ($attendanceRecords[$date] as $attendance) {
                $attendances->push($attendance);
            }
        } else {
            $attendances->push([
                'attendance_date' => $date,
                'status' => 'N/A',
                'reason' => 'No Record',
                'holiday' => null,
                'student' => null,
            ]);
        }
    }
    $totalDays = count($dates);
    $totalPresent = $attendanceRecords->flatten()->where('status', 'Present')->count();
    $totalAbsent = $attendanceRecords->flatten()->where('status', 'Absent')->count();
    $attendances = $attendances->sortBy('attendance_date');

    return view('schooladmin.attendence.student_attendance', compact('attendances', 'selectedMonth', 'student_id', 'student','totalDays', 'totalPresent', 'totalAbsent','totalHolidays'));
}




}
