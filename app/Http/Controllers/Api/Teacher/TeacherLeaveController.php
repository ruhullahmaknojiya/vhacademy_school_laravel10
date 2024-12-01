<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherLeave;
use App\Models\Teacher;
use App\Models\School;

use Illuminate\Support\Facades\Auth;

class TeacherLeaveController extends Controller
{
    // Get all leave requests for the logged-in teacher
    public function getLeaves()
    {
        $teacher = Auth::user();
        $leaves = TeacherLeave::where('teacher_id', $teacher->id)->orderBy('start_date', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $leaves
        ]);
    }

    // Apply for a leave
    public function applyLeave(Request $request)
    {
        $teacher = Auth::user();
        $teacherusers = Teacher::where('user_id', $teacher->id)->first();
        $school = School::where('id', $teacherusers->school_id)->first();
       
        $request->validate([
            'leave_type' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        $leave = new TeacherLeave();
        $leave->teacher_id = $teacher->id;
        $leave->school_id = $school->id; // assuming there's a school_id in the teacher's record
        $leave->leave_type = $request->leave_type;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->reason = $request->reason;
        $leave->status = 'Pending';
        $leave->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Leave request submitted successfully',
            'data' => $leave
        ]);
    }
}
