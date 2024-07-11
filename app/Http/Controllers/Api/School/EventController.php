<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\SchoolEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    public function getEvents(Request $request){

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1); // Current page
        $user = Auth::guard('api')->user();

        $events = Event::where('school_id','!=',null)->paginate($perPage, ['*'], 'page', $page);

        if ($events->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No Event found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $events->count(),
            'total' => $events->total(),
            'per_page' => $perPage,
            'current_page' => $events->currentPage(),
            'last_page' => $events->lastPage(),
            'Events' => $events->map(function ($event) {
                return [
                    'id' => $event->id,
                    'Event Name' => $event->event_title,
                    'Event Image' =>asset('public/images/admin/holidays/' . $event->event_image),
                    'event_pdf' => asset('public/images/admin/event/' . $event->event_pdf),
                    'short_Description' => $event->short_Description,
                    'start_date' => $event->start_date,
                    'event_video' => $event->event_video,
                    'end_date' => $event->end_date,
                    'color' => $event->color,
                          'repeat' => $event->repeated,

                    'School_id' => $event->school_id ,
                ];
            }),
        ];

        return response()->json($response);
    }
}
