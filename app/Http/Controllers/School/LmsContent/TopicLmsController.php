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

class TopicLmsController extends Controller
{
    public function index(Request $request)
    {
        $mediums = Medium::all();
    $standards = collect();
    $subjects = collect();
    $topic = collect();
    $subtopics = collect();

    $defaultMedium = Medium::first();
    $defaultStandard = $defaultMedium ? Standard::where('medium_id', $defaultMedium->id)->first() : null;
    $defaultSubject = $defaultStandard ? Subject::where('std_id', $defaultStandard->id)->first() : null;
    $defaultopic = $defaultStandard ? Subject::where('std_id', $defaultStandard->id)->first() : null;

    $defaultSubtopic = $defaultSubject ? SubTopic::where('topic_id', $defaultopic->id)->first() : null;

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

    if ($request->has('topic_id') && $request->topic_id != '') {
        $subtopics = SubTopic::where('topic_id', $request->topic_id)->with('topic')->get();
    } else if ($defaultopic) {
        $subtopics = SubTopic::where('topic_id', $defaultopic->id)->with('topic')->get();
        $request->topic_id = $defaultopic->id;
    }


        // $subtopics=SubTopic::with('topic')->get();


        return view('schooladmin.educational.topic.index',compact('mediums', 'standards', 'subjects', 'subtopics'));
    }

}
