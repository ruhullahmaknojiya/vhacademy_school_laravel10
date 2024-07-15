<?php

namespace App\Http\Controllers\api\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Medium;
use App\Models\Stander;

class GetRendomSubjectController extends Controller
{
    public function getSubject(Request $request)
    {
        // Retrieve exactly 10 subjects in random order without filtering by std_id
        $subjects = Subject::inRandomOrder()->take(10)->get();

        if ($subjects->isEmpty()) {
            return response()->json([
                'status' => 'false',
                'message' => 'No Subject found.',
            ], 502);
        }

        $response = [
            'status' => 'true',
            'count' => $subjects->count(),
            'total' => $subjects->count(), // Adjusted to show the correct total count
            'per_page' => 10, // Hardcoded to 10 since we're retrieving exactly 10 subjects
            'current_page' => 1, // Only one page when retrieving exactly 10 subjects
            'last_page' => 1, // Only one page when retrieving exactly 10 subjects
            'Subjects' => $subjects->map(function ($subject) {
                // Assuming 'standers' is the relationship name,
                $mediums = $subject->standers->mediums->whereIn('id', [$subject->std_id])->pluck('name'); // Adjust the relationship name accordingly
                $mediumsid= $subject->standers->mediums->whereIn('id', [$subject->std_id])->pluck('id'); // Adjust the relationship name accordingly

                return [
                    'id' => $subject->id,
                    'medium_name' => $mediums, // Corrected variable name to 'medium_name'
                    'medium_id' => $mediumsid, // Corrected variable name to 'medium_name'
                    'subject_name' => $subject->subject,
                    'subject_code' => $subject->subject_code,
                    'description' => $subject->description,
                    'sub_image' => asset('public/images/school/subject/' . $subject->sub_image), // Full path for sub_image
                    'std_id' => $subject->std_id,
                    'stander_name' => $subject->standers->name,
                    'subject_banner' => asset('public/images/school/subject/' . $subject->subject_banner), // Full path for subject_banner
                ];
            }),
        ];

        return response()->json($response);
    }



}
