<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeWork;
use App\Models\Student;
use App\Models\Holiday;
use App\Models\Attendance;
use App\Models\TeacherTimetable;
use Carbon\Carbon;



class StudentDataController extends Controller
{


public function getAttendance(Request $request)
{
    $student = Auth::guard('api')->user();
    $student_data = $student->student()->first();
    $school_id = $student_data->school_id;

    // Fetch all attendance records for the student
    $attendanceRecords = Attendance::where('student_id', $student_data->id)
        ->where('school_id', $school_id)
        ->get();

    // Calculate the start and end of the academic year
    $currentYear = Carbon::now()->year;
    $startOfAcademicYear = Carbon::createFromDate($currentYear, 6, 1); // June 1 of current year
    $endOfAcademicYear = Carbon::createFromDate($currentYear + 1, 5, 31); // May 31 of next year

    // Calculate total days in the academic year
    $totalDays = $startOfAcademicYear->diffInDays($endOfAcademicYear) + 1;

    // Track Sundays separately
    $sundays = [];
    for ($date = $startOfAcademicYear->copy(); $date->lte($endOfAcademicYear); $date->addDay()) {
        if ($date->isSunday()) {
            $formattedDate = $date->format('Y-m-d');
            $sundays[$formattedDate] = true;
        }
    }

    // Fetch all holidays
    $holidays = Holiday::where('school_id', $school_id)
        ->where(function ($query) use ($startOfAcademicYear, $endOfAcademicYear) {
            $query->where(function ($subQuery) use ($startOfAcademicYear, $endOfAcademicYear) {
                $subQuery->whereBetween('start_date', [$startOfAcademicYear, $endOfAcademicYear])
                         ->orWhereBetween('end_date', [$startOfAcademicYear, $endOfAcademicYear]);
            })->orWhere(function ($subQuery) use ($startOfAcademicYear, $endOfAcademicYear) {
                $subQuery->where('start_date', '<=', $startOfAcademicYear)
                         ->where('end_date', '>=', $endOfAcademicYear);
            });
        })
        ->get();

    // Collections to track different categories of holidays
    $vacationDates = [];
    $otherHolidayDates = [];

    // Identify and count vacation days (Diwali, Summer) excluding Sundays
    foreach ($holidays as $holiday) {
        $startDate = Carbon::parse($holiday->start_date)->startOfDay();
        $endDate = Carbon::parse($holiday->end_date)->startOfDay();
        for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
            if ($date->between($startOfAcademicYear, $endOfAcademicYear)) {
                $formattedDate = $date->format('Y-m-d');
                if ($this->isLongVacation($holiday)) {
                    if (!isset($sundays[$formattedDate])) { // Skip if it's a Sunday
                        $vacationDates[$formattedDate] = true; // Store vacation dates, avoiding duplicates
                    }
                } else {
                    // Count other holidays if not overlapping with vacations or Sundays
                    if (!isset($vacationDates[$formattedDate]) && !isset($sundays[$formattedDate])) {
                        $otherHolidayDates[$formattedDate] = true; // Track other unique holidays
                    }
                }
            }
        }
    }

    // Calculate totals
    $totalSundays = count($sundays);
    $totalVacations = count($vacationDates);
    $totalOtherHolidays = count($otherHolidayDates);

    // Calculate total holidays and days off
    $totalHolidays = $totalVacations + $totalOtherHolidays;
    $totalDaysOff = $totalHolidays + $totalSundays + 6;
   // ;

    // Calculate total working days
    $totalWorkingDays = $totalDays - $totalDaysOff;

    // Calculate present and absent days for the whole academic year
    $presentDays = $attendanceRecords->where('status', 'Present')->count();
    $absentDays = $attendanceRecords->where('status', 'Absent')->count();

    // Generate attendance summary for the current month
    $currentMonthStart = Carbon::now()->startOfMonth();
    $currentMonthEnd = Carbon::now()->endOfMonth();
    $currentMonthTotalDays = $currentMonthStart->diffInDays($currentMonthEnd) + 1;

    // Corrected logic to calculate working days in the current month
    $currentMonthWorkingDays = $currentMonthTotalDays - count(array_filter($sundays, function($date) use ($currentMonthStart, $currentMonthEnd) {
        return $date >= $currentMonthStart->format('Y-m-d') && $date <= $currentMonthEnd->format('Y-m-d');
    })) - count(array_filter($vacationDates, function($date) use ($currentMonthStart, $currentMonthEnd) {
        return $date >= $currentMonthStart->format('Y-m-d') && $date <= $currentMonthEnd->format('Y-m-d');
    })) - count(array_filter($otherHolidayDates, function($date) use ($currentMonthStart, $currentMonthEnd) {
        return $date >= $currentMonthStart->format('Y-m-d') && $date <= $currentMonthEnd->format('Y-m-d');
    }));

    $currentMonthPresentDays = $attendanceRecords->whereBetween('attendance_date', [$currentMonthStart, $currentMonthEnd])->where('status', 'Present')->count();
    $currentMonthAbsentDays = $attendanceRecords->whereBetween('attendance_date', [$currentMonthStart, $currentMonthEnd])->where('status', 'Absent')->count();

    // Prepare the response data
    $response = [
        'total_days' => $totalDays,
        'total_working_days' => $totalWorkingDays,
        'present_days' => $presentDays,
        'absent_days' => $absentDays,
        'holidays' => $totalDaysOff, // Total unique holidays including Sundays
        'total_sundays' => $totalSundays, // Total number of Sundays
        'current_month_summary' => [
            'month' => $currentMonthStart->format('F'),
            'total_days' => $currentMonthTotalDays,
            'total_working_days' => $currentMonthWorkingDays,
            'present_days' => $currentMonthPresentDays,
            'absent_days' => $currentMonthAbsentDays,
            'holidays' => $currentMonthTotalDays - $currentMonthWorkingDays,
        ],
    ];

    // Return response
    return response()->json([
        'student_id' => $student_data->id,
        'attendance_summary' => $response,
        'attendance_records' => $attendanceRecords->map(function ($record) {
            return [
                'date' => $record->attendance_date,
                'status' => $record->status,
                'absent_reason' => $record->absent_reason,
            ];
        }),
    ]);
}

// Helper function to determine if a holiday is a long vacation
private function isLongVacation($holiday)
{
    $vacationNames = ['DIWALI VACATION', 'SUMMER VACATION']; // Names can vary; adjust as needed
    return in_array($holiday->name, $vacationNames);
}





    public function getStudent(Request $request)
    {
        // Load authenticated student with relationships
        $student =  Auth::guard('api')->user()->student->load('Medium', 'standard', 'Subject.topic.subtopic');

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Return the student information
        return response()->json([
            'user_type' => Auth::user()->role_id,
            'data' => Auth::user(),
        ]);
    }
    
    

    public function updateStudentMedium(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'medium_id' => 'required|exists:mediums,id', // Assuming 'mediums' is the name of the table for mediums
        ]);

        // Load authenticated student
        $user = Auth::guard('api')->user();
        $student = $user->student;

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Update the student's medium_id
        $student->medium_id = $request->medium_id;
        $student->save();

        // Load the student with relationships
        $student->load('medium', 'standard', 'Subject.topic.subtopic');

        // Return the updated student information
        return response()->json([
            'user_type' => $user->role_id,
            'data' => $student,
        ]);
    }


    public function getStudentHomeworkData()
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the student associated with the authenticated user
            $student = $authenticatedUser->student()->first(); // Assuming students relationship exists
            
            if ($student) {
                
                // Fetch the student's homeworks based on medium, standard, and class
                $homeworks = HomeWork::where('medium_id', $student->medium_id)
                    ->where('standard_id', $student->class_id)
                    ->where('class_id', $student->section_id)
                    ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
                    ->get();
                // print('get homw medimu'.$homeworks);
                $homeworkData = $homeworks->map(function ($homework) {
                    return [
                        'teacher_first_name' => optional($homework->teacher)->first_name,
                        'teacher_last_name' => optional($homework->teacher)->last_name,
                        'phone' => optional($homework->teacher)->phone,
                        'homework_id' => optional($homework)->id,
                        'medium' => optional($homework->medium)->medium_name,
                        'standard' => optional($homework->standard)->standard_name ?? 'N/A',
                        'class' => optional($homework->classmodel)->class_name ?? 'N/A',
                        'subject' => optional($homework->subject)->subject ?? 'N/A',
                        'date' => $homework->date,
                        'submition_date' => $homework->submition_date,
                        'pdf_file' => $homework->pdf_file,
                        'topic_title' => $homework->topic_title,
                        'topic_description' => $homework->topic_description,
                    ];
                });

                return response()->json([
                    // 'student' => [
                        // 'first_name' => $authenticatedUser->teacher->first_name,
                        // 'last_name' => $authenticatedUser->teacher->last_name,
                    // ],
                    'homeworks' => $homeworkData,
                ], 200);
            } else {
                // If the authenticated user is not a student
                return response()->json(['error' => 'Authenticated user is not a student.'], 403);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }
    
    
    public function getStudentTimetable() {
        try {
           $authenticatedUser = Auth::guard('api')->user();
        $student = $authenticatedUser->student()->first();
       
        $timetable = TeacherTimetable::where('medium_id', $student->medium_id)
            ->where('standard_id', $student->class_id)
            ->where('class_id', $student->section_id)
            ->get();

        if ($timetable->isEmpty()) {
            return response()->json(['message' => 'No timetable data found.'], 404);
        }
            $formattedTimetable = $this->formatTimetable($timetable);

            return response()->json(['data' => $formattedTimetable], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'exception' => 'Error', 'file' => $e->getFile(), 'line' => $e->getLine()], 500);
        }
    }

    private function formatTimetable($timetable) {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $formattedTimetable = [];

    foreach ($days as $day) {
        $classes = $timetable->where('day', $day)->map(function ($class) {
            return [
                'subject' => $class->subject->subject,
                'time' => $class->start_time . ' - ' . $class->end_time,
                'teacher' => $class->teacher->first_name .' '.$class->teacher->last_name,
                'contact' => $class->teacher->phone,
            ];
        });

        $formattedTimetable[] = [
            'day' => $day,
            'classes' => $classes->values()->all(),
        ];
    }

    return $formattedTimetable;
}
    

}
