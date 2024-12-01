<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class EventHolidayController extends Controller
{



  public function getEventsAndHolidays(Request $request)
{
     // Global variable for school_id
    $school_id = null;
    $user = Auth::guard('api')->user();
    
     $student = Student::where('user_id', $user->id)->first();
        if ($student) {
            $school_id = $student->school_id; // Set school_id for students
        }
    
    // Fetch events and holidays related to the user's school
    $events = Event::all();
    $holidays = Holiday::all();

    $eventData = $events->map(function ($event) {
        return [
            'type' => 'event',
            'id' => $event->id,
            'event_name' => $event->event_title,
            'event_pdf' => asset('storage/app/public/admin/event/' . $event->event_pdf),
            'short_description' => $event->short_Description,
            'start_date' => $event->start_date,
            'event_video' => $event->event_video,
            'end_date' => $event->end_date,
            'color' => $event->color,
            'repeat' => $event->repeated,
        ];
    });
    $holidayData = $holidays->map(function ($holiday) {
        return [
            'type' => 'holiday',
            'id' => $holiday->id,
            'holiday_name' => $holiday->holiday_name,
            'start_date' => $holiday->start_date,
            'end_date' => $holiday->end_date,
            'description' => $holiday->description ?? '', // Add holiday description if available
            'color' => '#FFD700', // Default color for holidays
        ];
    });

    // Use concat to merge the eventData and holidayData collections
     $combinedData = $eventData->concat($holidayData)->values();

    // Format response
    $response = [
        'status' => 'true',
        'data' => $combinedData,
    ];

    return response()->json($response);
}

public function getEventsAndForstudentHolidays(Request $request)
{
    // Global variable for school_id
    $school_id = null;
    
    // Get the authenticated user
    $user = Auth::guard('api')->user();

    // Determine the school_id based on the user's role
    if ($user->role === 'teacher') {
        $teacher = Teacher::where('user_id', $user->id)->first();
        if ($teacher) {
            $school_id = $teacher->school_id; // Set school_id for teachers
        }
    } elseif ($user->role === 'student') {
        $student = Student::where('user_id', $user->id)->first();
        if ($student) {
            $school_id = $student->school_id; // Set school_id for students
        }
    }

    // Now use $school_id to filter events and holidays
    $events = Event::where('school_id', $school_id)->get(); // Get events for the specific school

    $holidays = Holiday::all(); // Get holidays for the specific school
   
    // Combine events and holidays into one collection
    $eventData = $events->map(function ($event) {
        return [
            'type' => 'event',
            'id' => $event->id,
            'event_name' => $event->event_title,
            'event_pdf' => asset('storage/app/public/admin/event/' . $event->event_pdf),
            'short_description' => $event->short_Description,
            'start_date' => $event->start_date,
            'event_video' => $event->event_video,
            'end_date' => $event->end_date,
            'color' => $event->color,
            'repeat' => $event->repeated,
        ];
    });
    $holidayData = $holidays->map(function ($holiday) {
        return [
            'type' => 'holiday',
            'id' => $holiday->id,
            'holiday_name' => $holiday->holiday_name,
            'start_date' => $holiday->start_date,
            'end_date' => $holiday->end_date,
            'description' => $holiday->description ?? '', // Add holiday description if available
            'color' => '#FFD700', // Default color for holidays
        ];
    });

    // Use concat to merge the eventData and holidayData collections
     $combinedData = $eventData->concat($holidayData)->values();

    $response = [
        'status' => 'true',
        'data' => $combinedData,
    ];

    return response()->json($response);
}


}
