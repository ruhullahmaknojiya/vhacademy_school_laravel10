<?php
namespace App\Http\Controllers\School\TeacherLeave;

use App\Http\Controllers\Controller;
use App\Models\TeacherLeave;
use App\Models\Teacher;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherLeaveController extends Controller
{
    // Display a listing of the leaves
    public function index()
    {
         $user = Auth::user();
        $school = School::where('user_id', $user->id)->first();
        $leaves = TeacherLeave::with('teacher')->where('school_id', $school->id)->paginate(10);
        return view('schooladmin.teacher_leave.index', compact('leaves'));
    }

    // Show the form for updating the status of the leave
    public function edit($id)
    {
        $leave = TeacherLeave::with('teacher')->findOrFail($id);
        return view('schooladmin.teacher_leave.edit', compact('leave'));
    }

    // Update the leave status
  public function update(Request $request, $id)
{
    $leave = TeacherLeave::findOrFail($id);
    $leave->status = $request->input('status');
    $leave->save();

    return redirect()->route('schooladmin.teacher_leaves.index')->with('success', 'Leave status updated successfully.');
}
}
