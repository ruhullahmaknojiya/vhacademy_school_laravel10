<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubTopicController extends Controller
{
    //


   public function getSubtopcs(Request $request)
    {
        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1); // Current page
        $topic = $request->input('topic_id'); // Category ID parameter

        $user=Auth::guard('api')->user();

        // Check if the user is authenticated
//        if (isset($user)) {
            // If authenticated, include both free and paid subtopics
            $subtopicsQuery = SubTopic::where('topic_id', $topic)->with(['topic'])->whereIn('type', ['free', 'paid']);

//        }
        $subtopics = $subtopicsQuery->paginate($perPage, ['*'], 'page', $page);


        if ($subtopics->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No SubTopics found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $subtopics->count(),
            'total' => $subtopics->total(),
            'per_page' => $perPage,
            'current_page' => $subtopics->currentPage(),
            'last_page' => $subtopics->lastPage(),
            'subtopics' => $subtopics->map(function ($subtopic) {
                return [
                    'id' => $subtopic->id,
                    'sub_topic' => $subtopic->sub_topic,
                    'type' => $subtopic->type,
                    'stopic_image' =>asset('public/images/school/subject/subtopics/' . $subtopic->stopic_image),
                    'description' => $subtopic->description,
                    'file_path' =>asset('public/pdf/subtopic/' . $subtopic->file_path),
                    'video_link' => $subtopic->video_link,
                    'topic_id' => $subtopic->topic_id,
                     'vhm_start_title' => $subtopic->vhm_start_title,
                    'vhm_end_title' => $subtopic->vhm_end_title,
                    'vhm_start_url' => $subtopic->vhm_start_url,
                    'vhm_end_url' => $subtopic->vhm_end_url,
                    'topic details' => [
                        'id' => $subtopic->topic->id,
                        'topic name' => $subtopic->topic->topic,

                    ],
//                    'helps' => $subtopic->subtopichelp->map(function ($help) {
//                        return [
//                            'id' => $help->id,
//                            'sub_topic' => $help->sub_topic,
//                            'std_id' => $help->std_id,
//                            'sub_id' => $help->sub_id,
//                            'topic_id' => $help->topic_id,
//                            'subtopic_id' => $help->subtopic_id,
//                            // 'help_video_link' => $help->help_video_link,
//                            // 'help_pdf' => asset('public/pdf/subtopic/help/' . $help->help_pdf),
//
//                        ];
//                    }),
//                    'references' => $subtopic->subtopicreference->map(function ($reference) {
//                        return [
//                            'id' => $reference->id,
//                            'sub_topic' => $reference->sub_topic,
//                            'std_id' => $reference->std_id,
//                            'sub_id' => $reference->sub_id,
//                            'topic_id' => $reference->topic_id,
//                            'subtopic_id' => $reference->subtopic_id,
//                            // 'reference_video_link' => $reference->reference_video_link,
//                            // 'reference_pdf' => asset('public/pdf/subtopic/reference/' . $reference->reference_pdf),
//
//                        ];
//                    }),
                ];
            }),
        ];

        return response()->json($response);
    }
}
