<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;


class EventHolidayController extends Controller
{



   public function getEventsAndHolidays(Request $request)
   {
       $perPage = $request->input('per_page', 10);
       $page = $request->input('page', 1); // Current page
       $user = Auth::guard('api')->user();

       $events = Event::where('school_id', '=', null)->get();

       $holidays = Holiday::where('school_id', '=', null)->get();

       $combinedData = $events->map(function ($event) {
           return [
               'type' => 'event',
               'id' => $event->id,
               'event_name' => $event->event_title,
               'event_image' => asset('public/images/admin/event/' . $event->event_image),
               'event_pdf' => asset('public/images/admin/event/' . $event->event_pdf),
               'short_description' => $event->short_Description,
               'start_date' => $event->start_date,
               'event_video' => $event->event_video,
               'end_date' => $event->end_date,
               'color' => $event->color,
                'repeat' => $event->repeated,

               'school' => $event->school, // Assuming 'school' relationship is defined
           ];
       })->merge(
           $holidays->map(function ($holiday) {
               return [
                   'type' => 'holiday',
                   'id' => $holiday->id,
                   'holiday_name' => $holiday->holiday_name,
                   'holiday_image' => asset('public/images/admin/holidays/' . $holiday->holiday_image),
                   'start_date' => $holiday->start_date,
                   'end_date' => $holiday->end_date,
                   // Add more fields as needed
               ];
           })
       );

       $response = [
           'status' => 'true',
           'data' => $combinedData->values(),
       ];


       return response()->json($response);
   }

}
