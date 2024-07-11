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
        $standards = Standard::all();
        $subjects = Subject::all();
        $topics = Topic::all();

        $query = SubTopic::query();

        if ($request->has('medium_id') && $request->medium_id) {
            $query->whereHas('topic.subject.standard.medium', function ($q) use ($request) {
                $q->where('id', $request->medium_id);
            });
        }

        if ($request->has('standard_id') && $request->standard_id) {
            $query->whereHas('topic.subject.standard', function ($q) use ($request) {
                $q->where('id', $request->standard_id);
            });
        }

        if ($request->has('subject_id') && $request->subject_id) {
            $query->whereHas('topic.subject', function ($q) use ($request) {
                $q->where('id', $request->subject_id);
            });
        }

        if ($request->has('topic_id') && $request->topic_id) {
            $query->where('topic_id', $request->topic_id);
        }

        $subtopics = $query->get();

        return view('schooladmin.educational.topic.index',compact('mediums', 'standards', 'subjects', 'topics' ,'subtopics'));
    }

}
