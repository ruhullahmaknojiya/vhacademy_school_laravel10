<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\ClassTeacherAssignment;
use Illuminate\Support\Facades\Auth;

class TAttandaceForStudentController extends Controller
{
   // 1. API to check if attendance is already submitted for the day
 public function checkAttendance(Request $request)
{
    $request->validate([
        'attendance_date' => 'required|date',
        'student_id' => 'required|integer',
    ]);

    // Get the authenticated user
    $authenticatedUser = Auth::user();

    // Check if the authenticated user is a teacher
    if (!$authenticatedUser->teacher()->exists()) {
        return response()->json([
            'submitted' => false,
            'message' => 'Authenticated user is not a teacher.',
        ], 403); // Return a 403 Forbidden status
    }

    // Find the attendance record for the given date and student
    $attendance = Attendance::where('attendance_date', $request->attendance_date)
        ->where('student_id', $request->student_id)
        ->first();

    if ($attendance) {
        return response()->json([
            'submitted' => true,
            'message' => 'Attendance for this student has already been submitted for the selected date.',
            'attendance_data' => [
                'id' => $attendance->id,
                'student_id' => $attendance->student_id,
                'class_id' => $attendance->class_id,
                'attendance_date' => $attendance->attendance_date,
                'status' => $attendance->status,
                'absentReason' => $attendance->absentReason,
                'created_at' => $attendance->created_at,
                'updated_at' => $attendance->updated_at,
                // Add more fields as needed
            ],
        ]);
    }

    return response()->json([
        'submitted' => false,
        'message' => 'Attendance not yet submitted for this student on the selected date.',
    ]);
}
   // 2. API to submit attendance for students
   public function submitAttendance(Request $request)
{
    // Validate the request data
    $request->validate([
        'attendance_date' => 'required|date',
        'class_id' => 'required|exists:classes,id',
        'attendance' => 'required|array',
        'attendance.*.student_id' => 'required|exists:students,id',
        'attendance.*.status' => 'required|in:Present,Late,Absent,Holiday,Half Day',
        'attendance.*.absent_reason' => 'nullable|string', // Validate reason if provided
    ]);

    // Get the authenticated teacher
    $authenticatedUser = Auth::user();
    $teacher = $authenticatedUser->teacher()->first();

    // Iterate over each attendance entry in the request
    foreach ($request->attendance as $attendanceData) {
        Attendance::create([
            'student_id' => $attendanceData['student_id'],
            'school_id' => $teacher->school_id,
            'class_id' => $request->class_id, // Store the class ID
            'attendance_date' => $request->attendance_date,
            'status' => $attendanceData['status'],
            'holiday_id' => $attendanceData['status'] === 'Holiday' ? $attendanceData['holiday_id'] : null,
            'absent_reason' => $attendanceData['absent_reason'], // Store the reason if provided
        ]);
    }

    // Return a success response
    return response()->json(['message' => 'Attendance submitted successfully']);
}

   // 3. API to update attendance for a student
   public function updateAttendance(Request $request, $id)
   {
       $request->validate([
           'status' => 'required|in:Present,Late,Absent,Holiday,Half Day',
           'holiday_id' => 'nullable|exists:holidays,id',
       ]);

       $attendance = Attendance::findOrFail($id);

       $attendance->update([
           'status' => $request->status,
           'holiday_id' => $request->status === 'Holiday' ? $request->holiday_id : null,
       ]);

       return response()->json(['message' => 'Attendance updated successfully']);
   }

    // 4. API to get assigned classes for the authenticated teacher
    public function getAssignedClasses(Request $request)
    {
        $authenticatedUser = Auth::user();
        $teacher = $authenticatedUser->teacher()->first(); // Retrieve the first teacher associated with the user
        $assignedClasses = ClassTeacherAssignment::where('teacher_id', $teacher->id)
            ->with(['medium', 'standard'])
            ->get(['medium_id', 'standard_id', 'class_id']);

        return response()->json(['assignedclass' => $assignedClasses]);
    }
}
