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
                // Fetch the teacher's timetables along with related user and other necessary relationships
                $timetables = TeacherTimetable::where('teacher_id', $teacher->id)
                    ->with(['teacher.user', 'medium', 'standerd', 'classmodel', 'subject'])
                    ->get();

                // Organize timetables by day
                $timetableData = [];
                foreach ($timetables as $timetable) {
                    $dayName = $timetable->day->day_name;

                    // Initialize the day array if it doesn't exist
                    if (!isset($timetableData[$dayName])) {
                        $timetableData[$dayName] = [];
                    }

                    // Append the timetable entry to the appropriate day
                    $timetableData[$dayName][] = [
                        'startTime' => $timetable->start_time,
                        'endTime' => $timetable->end_time,
                        'class' => "{$timetable->subject->subject} (Class {$timetable->standerd->standard_name} {$timetable->classs->class_name})",
                    ];
                }

                return response()->json([
                    'user' => [
                        'first_name' => $teacher->user->name,

                    ],
                    'timetables' => $timetableData,
                ], 200);
            } else {
                // If the authenticated user is not a teacher
                return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }





}
