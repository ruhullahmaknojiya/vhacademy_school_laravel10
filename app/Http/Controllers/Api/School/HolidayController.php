<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Controller;
use App\Models\SchoolHoliday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    //

    public function getHolidays(Request $request){

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1); // Current page


        $holidays = SchoolHoliday::paginate($perPage, ['*'], 'page', $page);

        if ($holidays->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No Holiday  found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $holidays->count(),
            'total' => $holidays->total(),
            'per_page' => $perPage,
            'current_page' => $holidays->currentPage(),
            'last_page' => $holidays->lastPage(),
            'Holidays' => $holidays->map(function ($holiday) {
                return [
                    'id' => $holiday->id,
                    'Holiday Name' => $holiday->holiday_name,
                    'Holiday Image' =>asset('public/images/admin/holidays/' . $holiday->holiday_image),
                    'Description' => $holiday->Description,
                    'start_date' => $holiday->start_date,
                    'end_date' => $holiday->end_date,
                    'School_id' => $holiday->school_id ,
                ];
            }),
        ];

        return response()->json($response);
    }
}
