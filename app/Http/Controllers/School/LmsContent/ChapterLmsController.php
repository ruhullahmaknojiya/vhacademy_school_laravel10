<?php

namespace App\Http\Controllers\School\LmsContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;


class ChapterLmsController extends Controller
{
    public function index(Request $request)
    {
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }
        $mediums = Medium::all();
        $standards = collect();
        $subjects = collect();
        $topics = collect();  // Changed from $subtopics to $topics for clarity

        $defaultMedium = Medium::first();
        $defaultStandard = $defaultMedium ? Standard::where('medium_id', $defaultMedium->id)->first() : null;
        $defaultSubject = $defaultStandard ? Subject::where('std_id', $defaultStandard->id)->first() : null;

        if ($request->has('medium_id') && $request->medium_id != '') {
            $standards = Standard::where('medium_id', $request->medium_id)->get();
        } else if ($defaultMedium) {
            $standards = Standard::where('medium_id', $defaultMedium->id)->get();
            $request->medium_id = $defaultMedium->id;
        }

        if ($request->has('standard_id') && $request->standard_id != '') {
            $subjects = Subject::where('std_id', $request->standard_id)->with('standard.medium')->get();
        } else if ($defaultStandard) {
            $subjects = Subject::where('std_id', $defaultStandard->id)->with('standard.medium')->get();
            $request->standard_id = $defaultStandard->id;
        }

        if ($request->has('subject_id') && $request->subject_id != '') {
             $topics = Topic::where('sub_id', $request->subject_id)->get();
        } else if ($defaultSubject) {
             $topics = Topic::where('sub_id', $defaultSubject->id)->get();
            $request->subject_id = $defaultSubject->id;
        }

        // Include subject relationship in the final topics query
        $topics = $topics->isEmpty() ? Topic::with(['subject'])->get() : $topics;

        return view('schooladmin.educational.chapter.index', compact('mediums', 'standards', 'subjects', 'topics'));
      }
}
