<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Medium;
Use App\Models\Standard;
use Illuminate\Support\Facades\Auth;


class TeacherMediumToSubjects extends Controller
{
  
    public function teacher_get_mediums()
    {
        try {
            // Get the authenticated teacher
            $teacher = Auth::guard('api')->user()->teacher;

            if (!$teacher) {
                return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
            }

            // Retrieve mediums assigned to the teacher
            $mediums = Medium::whereHas('teachers', function($query) use ($teacher) {
                $query->where('teacher_id', $teacher->id);
            })->get();

            // Return the medium data as a JSON response
            return response()->json(['mediums' => $mediums], 200);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => 'An error occurred while fetching medium data.', 'details' => $e->getMessage()], 500);
        }
    }

   
   public function teacher_get_standards_by_medium(Request $request)
{
    // Validate the request input
    $validated = $request->validate([
        'medium_id' => 'required|integer|exists:mediums,id',
    ]);

    try {
        // Get the authenticated teacher
        $teacher = Auth::guard('api')->user()->teacher;

        if (!$teacher) {
            return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
        }

        // Find the medium by ID and load its standards using eager loading
        $medium = Medium::with(['standard' => function($query) use ($teacher) {
            $query->whereHas('teacherSubjectAssigns', function($q) use ($teacher) {
                $q->where('teacher_id', $teacher->id);
            });
        }])->findOrFail($validated['medium_id']);

        // Return the standards data as a JSON response
        return response()->json(['standards' => $medium->standard], 200);
    } catch (\Exception $e) {
        // Handle any errors
        return response()->json([
            'error' => 'An error occurred while fetching standards data.',
            'details' => $e->getMessage()
        ], 500);
    }
}
     

    public function teacher_get_all_classes()
    {
    try {
        // Retrieve all class data
        $classes = ClassModel::all();

        // Return the class data as a JSON response
        return response()->json(['classes' => $classes], 200);
    } catch (\Exception $e) {
        // Handle any errors
        return response()->json(['error' => 'An error occurred while fetching class data.', 'details' => $e->getMessage()], 500);
    }
    }
    
    
   public function teacher_get_Assign_Subjects(Request $request)
{
    // Validate the request input
    $validated = $request->validate([
        'standard_id' => 'required|integer|exists:standards,id',
    ]);

    try {
        // Get the authenticated teacher
        $teacher = Auth::guard('api')->user()->teacher;

        if (!$teacher) {
            return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
        }

        // Retrieve the subjects assigned to the teacher for the specified standard
       $subjects = $teacher->teacherSubjectAssigns()
                    ->where('standard_id', $validated['standard_id'])
                    ->with('subject')
                    ->get()
                    ->pluck('subject')
                    ->map(function ($subject) {
                        return [
                            'id' => $subject->id,
                            'std_id' => $subject->std_id,
                            'subject_name' => $subject->subject,
                            'subject_code' => $subject->subject_code,
                            'description' => $subject->description,
                            'sub_pdf' => $subject->sub_pdf,
                            'created_at' => $subject->created_at,
                            'updated_at' => $subject->updated_at,
                        ];
                    });

    return response()->json(['Subjects' => $subjects]);

        // Return the subjects data as a JSON response
        return response()->json(['Subjects' => $subjects], 200);
    } catch (\Exception $e) {
        // Handle any errors
        return response()->json([
            'error' => 'An error occurred while fetching assigned subjects.',
            'details' => $e->getMessage()
        ], 500);
    }
}
    
    
}
