<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\HomeWork;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Attendances;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role_id' => 3])) {
            // Authentication successful
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            // Retrieve the student associated with the user
            $teacher = Teacher::where('user_id', $user->id)->get();

            if ($teacher) {
                // Retrieve the standard using the student's standard_id
                // $standard = Stander::where('status','1')->with('Subject.topic.subtopic')->get();

                // Retrieve the medium using the standard's medium_id
                // $medium = Medium::where('id', $standard->medium_id)
                //     ->pluck('name')
                //     ->first();

                // 'token' => $user->createToken('MyApp')->accessToken,

            }
            //  else {
            //     // Handle the case where the user has no associated student record
            //     return $this->sendError('Student record not found.', ['error' => 'Student record not found.']);
            // }
            return response()->json([
                'token' => $token,
                'user' => $user,
                'teacher' => $teacher,
                'message' => 'User login successfull',
            ], 200);
            // return $this->sendResponse($success, 'User login successfull.');
        } else {
            // Authentication failed
            return response()->json([
                'message' => 'Invalid credentials or user not found',
            ], 401);
        }
    }

    public function store(Request $request)
    {
        // Authenticate the user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Validate the request
            $request->validate([
                'medium_id' => 'required',
                'standard_id' => 'required',
                'class_id' => 'required',
                'subject_id' => 'required',
                'date' => 'required',
                'topic_title' => 'required',
                'topic_description' => 'required',
                'pdf_file' => 'nullable|file|mimes:pdf|max:2048', // Validate PDF file
            ], [
                'medium_id.required' => 'The Medium is required.',
                'standard_id.required' => 'The Standard is required.',
                'class_id.required' => 'The Class is required.',
                'subject_id.required' => 'The Subject is required.',
                'date.required' => 'The Date is required.',
                'topic_title.required' => 'The Topic Title is required.',
                'topic_description.required' => 'The Topic Description is required.',
                'pdf_file.file' => 'The file must be a valid PDF.',
                'pdf_file.mimes' => 'The file must be a PDF.',
                'pdf_file.max' => 'The file must not be larger than 2MB.',
            ]);

            // Get the authenticated user's teacher information
            $teacher = $authenticatedUser->teacher;

            if (!$teacher) {
                return response()->json(['error' => 'User is not a teacher.'], 403);
            }

            // Create a new HomeWork instance
            $save_homework = new HomeWork();
            $save_homework->teacher_id = $teacher->id;
            $save_homework->medium_id = $request->medium_id;
            $save_homework->standard_id = $request->standard_id;
            $save_homework->class_id = $request->class_id;
            $save_homework->subject_id = $request->subject_id;
            $save_homework->date = $request->date;
            $save_homework->topic_title = $request->topic_title;
            $save_homework->topic_description = $request->topic_description;
            $save_homework->school_id = $teacher->school_id;

            // Handle PDF file upload
            if ($request->hasFile('pdf_file')) {
                $pdf = $request->file('pdf_file');
                $pdfPath = $pdf->store('uploads/homework_pdfs', 'public'); // Save PDF in public storage

                if ($pdfPath) {
                    $save_homework->pdf_file = $pdfPath; // Save the PDF path in the database
                } else {
                    return response()->json(['error' => 'Failed to upload PDF file.'], 500);
                }
            }

            // Save the HomeWork instance
            $save_homework->save();

            return response()->json(['message' => 'Homework created successfully'], 201);
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }

    public function updatehomeworkstatus(Request $request, $id)
    {
        // submition_status
        $authenticatedUser = Auth::guard('api')->user();
        if ($authenticatedUser) {
            $validate = $request->validate([
                'submition_date' => 'required|date',
            ], [
                'submition_date.required' => 'The Submition Date is required.',
            ]);

            $save_homework = HomeWork::find($id);
            if ($save_homework) {
                $save_homework->submition_date = $request->submition_date;
                $save_homework->submition_status = "complete";
                $save_homework->save();

                return response()->json(['message' => 'Homework status updated successfully.'], 200);
            } else {
                return response()->json(['error' => 'Homework not found.'], 404);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }

    public function gethomeworkdata()
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the teacher associated with the authenticated user
            $teacher = $authenticatedUser->teacher;

            if ($teacher) {
                // Fetch the teacher's homeworks along with related user and other necessary relationships
                $homeworks = HomeWork::where('teacher_id', $teacher->id)
                    ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
                    ->get();

                $homeworkData = $homeworks->map(function ($homework) {
                    return [
                        'first_name' => optional($homework->teacher->user)->name,
//                        'last_name' => optional($homework->teacher->user)->last_name,
                        'id' => optional($homework)->id,
                        'medium' => optional($homework->medium)->name,
                        'standard' => optional($homework->stander)->name ?? 'N/A', // Default to 'N/A' if stander is null
                        'class' => optional($homework->classs)->name ?? 'N/A', // Default to 'N/A' if classs is null
                        'subject' => optional($homework->subject)->subject ?? 'N/A', // Default to 'N/A' if subject is null
                        'date' => $homework->date,
                        'submition_date' => $homework->submition_date,
                        'pdf_file' => $homework->pdf_file,
                        'topic_title' => $homework->topic_title,
                        'topic_description' => $homework->topic_description,

                    ];
                });

                return response()->json([
                    'user' => [
                        'first_name' => optional($teacher->user)->name,
//                        'last_name' => optional($teacher->user)->last_name,
                    ],
                    'HomeWorks' => $homeworkData,
                ], 200);
            } else {
                // If the authenticated user is not a teacher
                return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }

    public function getFilteredStudentData(Request $request)
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the teacher associated with the authenticated user
            $teacher = $authenticatedUser->teacher()->first(); // Assuming teacher relationship exists

            if ($teacher) {
                // Retrieve filter parameters from the request
                $mediumId = $request->input('medium_id');
                $standardId = $request->input('standard_id');
                $classId = $request->input('class_id');

                // Validate that parameters are provided
                if (!$mediumId || !$standardId || !$classId) {
                    return response()->json(['error' => 'Missing filter parameters.'], 400);
                }

                // Fetch all students matching the provided medium, standard, and class
                $students = Student::where('medium_id', $mediumId)
                    ->where('standard_id', $standardId)
                    ->where('class_id', $classId)
                    ->with(['users', 'medium', 'standard', 'classs'])
                    ->get();

                $studentData = $students->map(function ($student) {
                    return [
                        'first_name' => optional($student->users)->first_name,
                        'last_name' => optional($student->users)->last_name,
                        'phone' => optional($student->users)->phone,
                        'medium' => optional($student->medium)->name,
                        'standard' => optional($student->std)->name ?? 'N/A',
                        'class' => optional($student->classs)->name ?? 'N/A',
                        'address' => optional($student)->address ?? 'N/A',
                        'admission_no' => optional($student)->admission_no ?? 'N/A',
                        'blood_group' => optional($student)->blood_group ?? 'N/A',
                        'religion' => optional($student)->religion ?? 'N/A',
                        'caste' => optional($student)->caste ?? 'N/A',
                        'father_name' => optional($student)->father_name ?? 'N/A',
                        'father_education' => optional($student)->father_education ?? 'N/A',
                        'father_profession' => optional($student)->father_profession ?? 'N/A',
                        'father_designation' => optional($student)->father_designation ?? 'N/A',
                        'father_photo' => optional($student)->father_photo ?? 'N/A',
                        'mother_name' => optional($student)->mother_name ?? 'N/A',
                        'mother_phone' => optional($student)->mother_phone ?? 'N/A',
                        'mother_education' => optional($student)->mother_education ?? 'N/A',
                        'mother_profession' => optional($student)->mother_profession ?? 'N/A',
                        'mother_photo' => optional($student)->mother_photo ?? 'N/A',
                        'parent_contact' => optional($student)->parent_contact ?? 'N/A',
                        'parent_email' => optional($student)->parent_email ?? 'N/A',
                        'current_standard' => optional($student)->current_standard ?? 'N/A',
                        'favorite_subject' => optional($student)->favorite_subject ?? 'N/A',
                        'aadhar_number' => optional($student)->aadhar_number ?? 'N/A',
                        'emergency_contact' => optional($student)->emergency_contact ?? 'N/A',
                        'medical_information' => optional($student)->medical_information ?? 'N/A',
                        'state' => optional($student)->state ?? 'N/A',
                        'city' => optional($student)->city ?? 'N/A',

                    ];
                });

                return response()->json([
                    'teacher' => [
                        'name' => $authenticatedUser->name,
//                        'last_name' => $authenticatedUser->last_name,
                    ],
                    'students' => $studentData,
                ], 200);
            } else {
                // If the authenticated user is not a teacher
                return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
            }
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }



  public function store_attendance(Request $request)
  {
      // Validate the request
      $request->validate([
          'medium_id' => 'required|exists:mediums,id',
          'standard_id' => 'required|exists:standers,id',
          'class_id' => 'required|exists:classses,id',
          'student_id' => 'required|exists:students,id',
          'atendance_status' => 'required',
          'date' => 'required|date',
      ]);

      // Authenticate the user
      $authenticatedUser = Auth::guard('api')->user();

      if (!$authenticatedUser) {
          return response()->json(['error' => 'Unauthorized.'], 403);
      }

      // Get the authenticated user's teacher information
      $teacher = $authenticatedUser->teacher()->first(); // Retrieve the first teacher associated with the user

      if (!$teacher) {
          return response()->json(['error' => 'User is not a teacher.'], 403);
      }

      try {
          // Start a transaction
          DB::beginTransaction();

          // Check if the attendance record already exists


              // Insert a new attendance record
              Attendances::create([
                  'teacher_id' => $teacher->id,
                  'medium_id' => $request->medium_id,
                  'standard_id' => $request->standard_id,
                  'class_id' => $request->class_id,
                  'school_id' => $teacher->school_id,
                  'student_id' => $request->student_id,
                  'date' => $request->date,
                  'atendance_status' => $request->atendance_status,
                  'submition_status' => 'pending',
              ]);
              $message = 'Attendance submitted successfully';


          // Commit the transaction
          DB::commit();

          return response()->json(['message' => $message], 201);
      } catch (\Exception $e) {
          // Rollback the transaction on error
          DB::rollBack();

          return response()->json(['error' => 'Failed to submit attendance.', 'details' => $e->getMessage()], 500);
      }
  }

  public function check_attendance(Request $request)
  {
      // Validate the request
      $request->validate([
          'medium_id' => 'required|exists:mediums,id',
          'standard_id' => 'required|exists:standers,id',
          'class_id' => 'required|exists:classses,id',
          'student_id' => 'required|exists:students,id',
          'date' => 'required|date',
      ]);

      // Authenticate the user
      $authenticatedUser = Auth::guard('api')->user();

      if (!$authenticatedUser) {
          return response()->json(['error' => 'Unauthorized.'], 403);
      }

      // Get the authenticated user's teacher information
      $teacher = $authenticatedUser->teacher()->first(); // Retrieve the first teacher associated with the user

      if (!$teacher) {
          return response()->json(['error' => 'User is not a teacher.'], 403);
      }

      try {
          // Check if the attendance record already exists
          $existingAttendance = Attendances::where('medium_id', $request->medium_id)
              ->where('standard_id', $request->standard_id)
              ->where('class_id', $request->class_id)
              ->where('school_id', $teacher->school_id)
              ->where('student_id', $request->student_id)
              ->where('date', $request->date)
              ->first();

          if ($existingAttendance) {
              return response()->json(['message' => 'Attendance for this student on this date has already been submitted.'], 409);
          } else {
              return response()->json(['message' => 'No attendance record found for this student on this date.'], 404);
          }
      } catch (\Exception $e) {
          return response()->json(['error' => 'Failed to check attendance.', 'details' => $e->getMessage()], 500);
      }
  }

}
