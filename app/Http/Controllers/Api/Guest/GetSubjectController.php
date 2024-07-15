<?php

namespace App\Http\Controllers\Api\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class GetSubjectController extends Controller
{
    public function getSubject(Request $request){

        $perPage = $request->input('per_page', 100);
        $page = $request->input('page', 1); // Current page
        // $user=Auth::guard('api')->user();
        $std_id= $request->standard_id;
       if(isset($std_id)){
         $subjects = Subject::where('std_id',$std_id)->paginate($perPage, ['*'], 'page', $page);
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
                    'std_id' => $subject->std_id,
                    'perthdarshini' => $subject->sub_pdf
                ];
            }),
        ];

        return response()->json($response);
    }
}
