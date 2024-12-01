<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\HomeSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class HomeSubjectController extends Controller
{
    //
    public function getSubjects(Request $request)
    {

        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1); // Current page
        $user = Auth::guard('api')->user();

        // if (isset($user)) {

        //     $subjects = HomeSubject::paginate($perPage, ['*'], 'page', $page);
        // }
            $subjects = HomeSubject::paginate($perPage, ['*'], 'page', $page);
            if ($subjects->isEmpty()) {
                return response()->json([
                    'status' => 'false',
                    'message' => 'No Subject found.',
                ], 502);
            }


            $response = [
                'status' => 'true',
                'count' => $subjects->count(),
                'total' => $subjects->total(),
                'per_page' => $perPage,
                'current_page' => $subjects->currentPage(),
                'last_page' => $subjects->lastPage(),
                'Subjects' => $subjects->map(function ($subject) {
                    return [
                        'id' => $subject->id,
                        'subject_name' => $subject->subject_title,
                        'subject_code' => $subject->subject_code,
                        'type' => $subject->type,
                        'description' => $subject->description,
                        'sub_image' => asset('public/images/school/subject/' . $subject->sub_image), // Full path for sub_image
                        'subject_banner' => asset('public/images/school/subject/' . $subject->subject_banner), // Full path for subject_banner
                    ];
                }),
            ];

            return response()->json($response);
        }
    }
