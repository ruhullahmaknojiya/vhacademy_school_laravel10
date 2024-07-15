<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetTopicController extends Controller
{
    public function getTopics(Request $request)
    {
        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1);
        $subjectId = $request->input('subject_id');




            $topics = Topic::where('sub_id', $subjectId)
                ->with(['subject.standers'])
                ->paginate($perPage, ['*'], 'page', $page);

            if ($topics->isEmpty()) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'No Topics found.',
                ], 502);
            }

            $response = [
                'status' => 'true',
                'count' => $topics->count(),
                'total' => $topics->total(),
                'per_page' => $perPage,
                'current_page' => $topics->currentPage(),
                'last_page' => $topics->lastPage(),
                'Topics' => $topics->map(function ($topic) {
                    return [
                        'id' => $topic->id,
                        'topic' => $topic->topic,
                        'topic_image' => asset('public/images/school/subject/topics/' . $topic->topic_image),
                        'type' => $topic->type,
                        'file_path' => asset('public/pdf/topics/' . $topic->file_path),
                        'description' => $topic->description,
                        'video_link' => $topic->video_link,
                        'sub_id' => $topic->sub_id,
                        'topic_banner' => asset('public/images/school/subject/topics/' . $topic->topic_banner),
                        'subject' => [
                            'id' => $topic->subject->id,
                            'name' => $topic->subject->subject,
                            'perthdashini' => asset('storage/app/public/pdf/subject/'  . $topic->subject->sub_pdf),
                            'standard' => [
                                'id' => $topic->subject->standers->id,
                                'name' => $topic->subject->standers->standard_name,

                            ],

                        ],
                    ];
                }),
            ];

            return response()->json($response);
        }
}
