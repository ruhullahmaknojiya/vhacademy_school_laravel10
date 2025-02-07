<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Standard;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id', 'desc')->paginate(2);
        $standards = Standard::withCount('topics')->orderBy('id', 'desc')->latest()->get();

        $topicsCountPerStandard = DB::table('topics')
            ->select('standard_id', DB::raw('COUNT(*) as topic_count'))
            ->groupBy('standard_id')
            ->orderBy('topic_count', 'asc')
            ->get();

        return view('front.dashboard', compact('schools', 'standards', 'topicsCountPerStandard'));
    }
}
