<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    //

    public function getSubject(Request $request){


        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1); // Current page
        $user=Auth::guard('api')->user();

       if(isset($user)){
       $subjects = Subject::where('std_id',$user->student->standard_id)->paginate($perPage, ['*'], 'page', $page);
         }else{
    $subjects = Subject::paginate($perPage, ['*'], 'page', $page);
       }


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
                    'subject_name' => $subject->subject,
                    'subject_code' => $subject->subject_code,
                    'description' => $subject->description,
                    'sub_image' => asset('public/images/school/subject/' . $subject->sub_image), // Full path for sub_image
                    'std_id' => $subject->standard->standard_name ?? '',
                    'subject_banner' => asset('public/images/school/subject/' . $subject->subject_banner), // Full path for subject_banner
                ];
            }),
        ];

        return response()->json($response);
    }
}
