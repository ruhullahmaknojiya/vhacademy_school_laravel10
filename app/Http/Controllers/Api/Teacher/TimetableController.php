<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\TeacherTimetable;

use Illuminate\Support\Facades\Auth;

class TimetableController extends Controller
{
    public function getTimetable()
{
    // Get the authenticated user
    $authenticatedUser = Auth::guard('api')->user();

    if ($authenticatedUser) {
        // Fetch the teacher associated with the authenticated user
        $teacher = $authenticatedUser->teacher;

        if ($teacher) {
            // Fetch the teacher's timetables along with related user and other necessary relationships using eager loading
            $timetables = TeacherTimetable::where('teacher_id', $teacher->id)
                ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
                ->get()
                ->sortBy('start_time'); // Sort timetables by start_time

            // Organize timetables by day
            $timetableData = $timetables->groupBy('day')->map(function ($dayTimetables) {
                return $dayTimetables->map(function ($timetable) {
                    return [
                        'startTime' => $timetable->start_time,
                        'endTime' => $timetable->end_time,
                        'class' => "{$timetable->subject->subject} ({$timetable->medium->medium_name}: {$timetable->standard->standard_name} {$timetable->classmodel->class_name})",
                    ];
                })->sortBy('startTime')->values(); // Sort timetables within each day by startTime and reindex the collection
            });

            return response()->json([
                'user' => [
                    'username' => $teacher->user->name,
                    'name' => $teacher->first_name . ' ' . $teacher->last_name,
                ],
                'timetables' => $timetableData,
            ], 200);
        } else {
            // If the authenticated user is not a teacher
            return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
        }
    } else {
        // If user is not authenticated, return unauthorized error
        return response()->json(['error' => 'Unauthorized.'], 401);
    }
}





}
