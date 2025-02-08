<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;
use App\Models\Standard;

class CourseController extends Controller
{
    public function course()
    {
        $mediums = Medium::all();
        $standards = Standard::all();
        return view('front.course', compact('mediums', 'standards'));
    }


    public function getStandards($mediumId)
    {
        $standards = Standard::where('medium_id', $mediumId)->take(8)->get();

        return response()->json([
            'status' => true,
            'message' => 'Standard Records Fetched Successfully',
            'standards' => $standards
        ]);
    }
}
