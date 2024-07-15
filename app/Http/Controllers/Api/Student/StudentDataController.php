<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HomeWork;
use App\Models\Student;

class StudentDataController extends Controller
{



    public function getStudent(Request $request)
    {
        // Load authenticated student with relationships
        $student =  Auth::guard('api')->user()->student->load('Medium', 'standard', 'Subject.topic.subtopic');

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Return the student information
        return response()->json([
            'user_type' => Auth::user()->role_id,
            'data' => Auth::user(),
        ]);
    }

    public function updateStudentMedium(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'medium_id' => 'required|exists:mediums,id', // Assuming 'mediums' is the name of the table for mediums
        ]);

        // Load authenticated student
        $user = Auth::guard('api')->user();
        $student = $user->student;

        if (!$student) {
            return response()->json(['error' => 'Student not found'], 404);
        }

        // Update the student's medium_id
        $student->medium_id = $request->medium_id;
        $student->save();

        // Load the student with relationships
        $student->load('medium', 'standard', 'Subject.topic.subtopic');

        // Return the updated student information
        return response()->json([
            'user_type' => $user->role_id,
            'data' => $student,
        ]);
    }


    public function getStudentHomeworkData()
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the student associated with the authenticated user
            $student = $authenticatedUser->student()->first(); // Assuming students relationship exists

            if ($student) {
                // Fetch the student's homeworks based on medium, standard, and class
                $homeworks = HomeWork::where('medium_id', $student->medium_id)
                    ->where('standard_id', $student->standard_id)
                    ->where('class_id', $student->class_id)
                    ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
                    ->get();

                $homeworkData = $homeworks->map(function ($homework) {
                    return [
                        'teacher_first_name' => optional($homework->teacher)->first_name,
                        'teacher_last_name' => optional($homework->teacher)->last_name,
                        'phone' => optional($homework->teacher)->phone,
                        'homework_id' => optional($homework)->id,
                        'medium' => optional($homework->medium)->medium_name,
                        'standard' => optional($homework->standard)->standard_name ?? 'N/A',
                        'class' => optional($homework->classmodel)->class_name ?? 'N/A',
                        'subject' => optional($homework->subject)->subject ?? 'N/A',
                        'date' => $homework->date,
                        'submition_date' => $homework->submition_date,
                        'pdf_file' => $homework->pdf_file,
                        'topic_title' => $homework->topic_title,
                        'topic_description' => $homework->topic_description,
                    ];
                });

                return response()->json([
                    // 'student' => [
                        // 'first_name' => $authenticatedUser->teacher->first_name,
                        // 'last_name' => $authenticatedUser->teacher->last_name,
                    // ],
                    'homeworks' => $homeworkData,
                ], 200);
            } else {
                // If the authenticated user is not a student
                return response()->json(['error' => 'Authenticated user is not a student.'], 403);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }

}
