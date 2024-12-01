<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\HomeWork;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Attendances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // Import the Log facade for logging

  // Include FPDF library


class TeacherController extends Controller
{
    public function teacher_login(Request $request)
    {
    // Validate the request input
    $validator = Validator::make($request->all(), [
        'name' => 'required|string',
        'password' => 'required|string',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'message' => 'Invalid input',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Retrieve the 'Teacher' role from the cache or database
    $teacherRole = Cache::remember('teacher_role', 60, function () {
        return Role::where('name', 'Teacher')->first();
    });

    if (!$teacherRole) {
        return response()->json([
            'message' => 'Teacher role not found',
        ], 404);
    }

    // Attempt to authenticate the user with the given credentials and role
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role_id' => $teacherRole->id])) {
        // Authentication successful
        $user = Auth::user();
        $token = $user->createToken('MyApp')->accessToken;

        // Retrieve the teacher associated with the user
        $teacher = Teacher::where('user_id', $user->id)->first();

        return response()->json([
            'token' => $token,
            'user' => $user,
            'teacher' => $teacher,
            'message' => 'User login successful',
        ], 200);
    } else {
        // Authentication failed
        return response()->json([
            'message' => 'Invalid credentials or user not found',
        ], 401);
    }
 }
 
 
    public function getAuthenticatedTeacherData()
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the teacher associated with the authenticated user
            $teacher = $authenticatedUser->teacher;

            if ($teacher) {
                // Load the teacher's related data
                $teacherData = Teacher::with([
                    'user',
                    'subjects',
                    'standards',
                    'mediums'
                ])->where('id', $teacher->id)->first();

                return response()->json([
                    'teacher' => $teacherData,
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
    //require_once(public_path('fpdf/fpdf.php'));
    
 public function store(Request $request)
{
    // Validate the request input
    $validator = Validator::make($request->all(), [
        'medium_id' => 'required|integer|exists:mediums,id',
        'standard_id' => 'required|integer|exists:standards,id',
        'class_id' => 'required|integer|exists:classes,id',
        'subject_id' => 'required|integer|exists:subjects,id',
        'date' => 'required|date',
        'pdf_file' => 'required|file|mimes:pdf,jpeg,jpg,png,gif|max:2048',
        'topic_title' => 'required|string|max:255',
        'topic_description' => 'required|string|max:255',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    try {
        // Get the authenticated user and check their role
        $user = Auth::guard('api')->user();

        // Check if the user has the teacher role
        $teacherRole = Role::where('name', 'Teacher')->first();
        if (!$user || $user->role_id !== $teacherRole->id) {
            return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
        }

        // Get the teacher associated with the user
        $teacher = $user->teacher;

        if (!$teacher) {
            return response()->json(['error' => 'No teacher associated with this user.'], 403);
        }

        // Handle file upload and conversion
        
        if ($request->hasFile('pdf_file')) {
            
            $file = $request->file('pdf_file');
            $fileExtension = $file->getClientOriginalExtension();
            Log::info('File extension: ' . $fileExtension); // Log file extension

            if ($fileExtension == 'pdf') {
               
                $file->store('public/homework_pdfs');
                $filePath = 'https://vhmacademy.com/public/storage/homework_pdfs/' . $file->hashName();
                Log::info('PDF file stored at: ' . $filePath); // Log PDF file path
            } else {
                
                
                // Handle image file
                // Store the image temporarily
                $imagePath = $file->store('public/temp_images');
                $imagePath = storage_path('app/' . $imagePath);
                Log::info('Image file stored temporarily at: ' . $imagePath); // Log image file path

                // Include FPDF library
                require_once(app_path('libraries/fpdf/fpdf.php'));

                // Create a new PDF document using FPDF
                $pdf = new \FPDF();
                $pdf->AddPage();

                // Get the image dimensions
                list($width, $height) = getimagesize($imagePath);
                Log::info('Image dimensions - Width: ' . $width . ', Height: ' . $height); // Log image dimensions
                $pdfWidth = $pdf->GetPageWidth();
                $pdfHeight = $pdf->GetPageHeight();

                // Calculate the dimensions for the image to fit in the PDF
                $widthScale = $pdfWidth / $width;
                $heightScale = $pdfHeight / $height;
                $scale = min($widthScale, $heightScale);

                $imagePdfWidth = $width * $scale;
                $imagePdfHeight = $height * $scale;
                Log::info('Scaled image dimensions - Width: ' . $imagePdfWidth . ', Height: ' . $imagePdfHeight); // Log scaled dimensions

                // Center the image in the PDF
                $x = ($pdfWidth - $imagePdfWidth) / 2;
                $y = ($pdfHeight - $imagePdfHeight) / 2;

                // Add the image to the PDF
                $pdf->Image($imagePath, $x, $y, $imagePdfWidth, $imagePdfHeight);
                Log::info('Image added to PDF'); // Log image addition

                // Store the PDF
                $pdfOutputPath = 'public/homework_pdfs/' . pathinfo($file->hashName(), PATHINFO_FILENAME) . '.pdf';
                $pdf->Output(storage_path('app/' . $pdfOutputPath), 'F');
                Log::info('PDF stored at: ' . $pdfOutputPath); // Log PDF storage path

                // Construct the URL to the stored PDF
                $filePath = 'https://vhmacademy.com/public/storage/homework_pdfs/' . pathinfo($file->hashName(), PATHINFO_FILENAME) . '.pdf';
                Log::info('PDF URL: ' . $filePath); // Log PDF URL

                // Delete the temporary image
                unlink($imagePath);
                Log::info('Temporary image deleted'); // Log image deletion
            }
        }
        
        if(!$filePath){
            return response()->json([
            'error' => 'An error occurred while creating the homework.',
            'details' => $e->getMessage()
        ], 500);
        }else{
             // Create the homework record
        $homework = Homework::create([
            'teacher_id' => $teacher->id,
            'medium_id' => $request->medium_id,
            'standard_id' => $request->standard_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id,
            'school_id' => $teacher->school_id, // Retrieve school_id from teacher
            'date' => $request->date,
            'pdf_file' => $filePath, // Store public file path in the database
            'topic_title' => $request->topic_title,
            'topic_description' => $request->topic_description,
        ]);
        }
       

        return response()->json(['homework' => $homework], 201);
    } catch (\Exception $e) {
        // Log the error details for debugging
        Log::error('An error occurred while creating the homework: ' . $e->getMessage());
        return response()->json([
            'error' => 'An error occurred while creating the homework.',
            'details' => $e->getMessage()
        ], 500);
    }
}

    
    public function getTeacherHomeworks()
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();

        if ($authenticatedUser) {
            // Fetch the teacher associated with the authenticated user
            $teacher = $authenticatedUser->teacher;

            if ($teacher) {
                // Fetch the teacher's homeworks along with related user and other necessary relationships
                $homeworks = Homework::where('teacher_id', $teacher->id)
                    ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
                    ->orderBy('created_at', 'desc') // Order by creation date in descending order
                    ->get();

                $homeworkData = $homeworks->map(function ($homework) {
                    return [
                        'first_name' => optional($homework->teacher)->first_name,
                        'last_name' => optional($homework->teacher)->last_name,
                        'id' => optional($homework)->id,
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
                    'user' => [
                        'first_name' => optional($teacher)->first_name,
                        'last_name' => optional($teacher)->last_name,
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

    public function updatehomeworkstatus(Request $request, $id)
    {
        // Get the authenticated user
        $authenticatedUser = Auth::guard('api')->user();
        if (!$authenticatedUser) {
            return response()->json(['error' => 'Unauthorized.'], 403);
        }

        // Validate the request input
        $request->validate([
            'submition_date' => 'required|date',
        ], [
            'submition_date.required' => 'The submission date is required.',
        ]);

        // Find the homework by ID
        $homework = Homework::find($id);
        if (!$homework) {
            return response()->json(['error' => 'Homework not found.'], 404);
        }

        // Update the homework status
        $homework->submition_date = $request->submition_date;
        $homework->submition_status = "complete";
        $homework->save();

        return response()->json(['message' => 'Homework status updated successfully.'], 200);
    }

//     public function gethomeworkdata()
//     {
//         // Get the authenticated user
//         $authenticatedUser = Auth::guard('api')->user();

//         if ($authenticatedUser) {
//             // Fetch the teacher associated with the authenticated user
//             $teacher = $authenticatedUser->teacher;

//             if ($teacher) {
//                 // Fetch the teacher's homeworks along with related user and other necessary relationships
//                 $homeworks = HomeWork::where('teacher_id', $teacher->id)
//                     ->with(['teacher.user', 'medium', 'standard', 'classmodel', 'subject'])
//                     ->get();

//                 $homeworkData = $homeworks->map(function ($homework) {
//                     return [
//                         'first_name' => optional($homework->teacher->user)->name,
// //                        'last_name' => optional($homework->teacher->user)->last_name,
//                         'id' => optional($homework)->id,
//                         'medium' => optional($homework->medium)->medium_name,
//                         'standard' => optional($homework->standard)->standard_name ?? 'N/A', // Default to 'N/A' if stander is null
//                         'class' => optional($homework->classmodel)->class_name ?? 'N/A', // Default to 'N/A' if classs is null
//                         'subject' => optional($homework->subject)->subject ?? 'N/A', // Default to 'N/A' if subject is null
//                         'date' => $homework->date,
//                         'submition_date' => $homework->submition_date,
//                         'pdf_file' => $homework->pdf_file,
//                         'topic_title' => $homework->topic_title,
//                         'topic_description' => $homework->topic_description,

//                     ];
//                 });

//                 return response()->json([
//                     'user' => [
//                         'first_name' => optional($teacher->user)->name,
// //                        'last_name' => optional($teacher->user)->last_name,
//                     ],
//                     'HomeWorks' => $homeworkData,
//                 ], 200);
//             } else {
//                 // If the authenticated user is not a teacher
//                 return response()->json(['error' => 'Authenticated user is not a teacher.'], 403);
//             }
//         } else {
//             // If user is not authenticated, return unauthorized error
//             return response()->json(['error' => 'Unauthorized.'], 403);
//         }
//     }









     public function get_mediums()
{
    try {
        // Retrieve all mediums
        $mediums = Medium::all();

        // Return the medium data as a JSON response
        return response()->json(['mediums' => $mediums], 200);
    } catch (\Exception $e) {
        // Handle any errors
        return response()->json(['error' => 'An error occurred while fetching medium data.', 'details' => $e->getMessage()], 500);
    }
}

public function get_standards_by_medium(Request $request)
{
    // Validate the request input
    $validated = $request->validate([
        'medium_id' => 'required|integer|exists:mediums,id',
    ]);

    try {
        // Retrieve the medium and its associated standards
        $medium = Medium::with('standard')->findOrFail($validated['medium_id']);

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


public function get_all_classes()
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

///
public function get_standards_by_medium_assignedclass_sub_wise(Request $request)
{
    // Validate the request input
    $validated = $request->validate([
        'medium_id' => 'required|integer|exists:mediums,id',
    ]);

    try {
        $medium_id = $validated['medium_id'];
        $authenticatedUser = Auth::guard('api')->user();
        // Fetch the teacher associated with the authenticated user
        $teacher = $authenticatedUser->teacher;
            
        $teacher_id = $teacher->id;

        // Retrieve the standards assigned to the teacher as a class teacher
        $classTeacherStandards = DB::table('classes_teacher_assignments')
            ->join('standards', 'classes_teacher_assignments.standard_id', '=', 'standards.id')
            ->where('classes_teacher_assignments.medium_id', $medium_id)
            ->where('classes_teacher_assignments.teacher_id', $teacher_id)
            ->select('standards.id', 'standards.standard_name'); // Assuming 'standards' has 'id' and 'name' columns

        // Retrieve the standards assigned to the teacher as a subject teacher
        $subjectTeacherStandards = DB::table('teacher_subject_assigns')
            ->join('standards', 'teacher_subject_assigns.standard_id', '=', 'standards.id')
            ->where('teacher_subject_assigns.medium_id', $medium_id)
            ->where('teacher_subject_assigns.teacher_id', $teacher_id)
            ->select('standards.id', 'standards.standard_name');

        // Combine the results and ensure distinct entries
        $standards = $classTeacherStandards
            ->union($subjectTeacherStandards)
            ->distinct()
            ->get();

        // Return the standards data as a JSON response
        return response()->json(['standards' => $standards], 200);
    } catch (\Exception $e) {
        // Handle any errors
        return response()->json([
            'error' => 'An error occurred while fetching standards data.',
            'details' => $e->getMessage()
        ], 500);
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

            // Fetch all students matching the provided medium, standard, and class, including parent data
            $students = Student::where('medium_id', $mediumId)
                ->where('class_id', $standardId)
                ->where('section_id', $classId)
                ->with(['parent', 'medium', 'standard', 'classs'])
                ->get();

            $studentData = $students->map(function ($student) {
                return [
                    'id' => optional($student)->id,
                    'first_name' => optional($student)->first_name,
                    'last_name' => optional($student)->last_name,
                    'phone' => optional($student)->mobile_number,
                    'medium' => optional($student->medium)->medium_name,
                    'standard' => optional($student->standard)->standard_name ?? 'N/A',
                    'class' => optional($student->classs)->class_name ?? 'N/A',
                    'address' => optional($student)->current_address ?? 'N/A',
                    'admission_no' => optional($student)->admission_no ?? 'N/A',
                    'gender' => optional($student)->gender ?? 'N/A',
                    'blood_group' => optional($student)->blood_group ?? 'N/A',
                    'date_of_birth' => optional($student)->date_of_birth ?? 'N/A',
                    'religion' => optional($student)->religion ?? 'N/A',
                    'caste' => optional($student)->caste ?? 'N/A',
                    'father_name' => optional($student->parent)->father_name ?? 'N/A',
                    'father_phone' => optional($student->parent)->father_phone ?? 'N/A',
                    'father_occupation' => optional($student->parent)->father_occupation ?? 'N/A',
                    'father_photo' => optional($student->parent)->father_photo ?? 'N/A',
                    'mother_name' => optional($student->parent)->mother_name ?? 'N/A',
                    'mother_phone' => optional($student->parent)->mother_phone ?? 'N/A',
                    'mother_occupation' => optional($student->parent)->mother_occupation ?? 'N/A',
                    'mother_photo' => optional($student->parent)->mother_photo ?? 'N/A',
                    'guardian_name' => optional($student->parent)->guardian_name ?? 'N/A',
                    'guardian_relation' => optional($student->parent)->guardian_relation ?? 'N/A',
                    'guardian_email' => optional($student->parent)->guardian_email ?? 'N/A',
                    'guardian_phone' => optional($student->parent)->guardian_phone ?? 'N/A',
                    'guardian_occupation' => optional($student->parent)->guardian_occupation ?? 'N/A',
                    'guardian_address' => optional($student->parent)->guardian_address ?? 'N/A',
                    'guardian_photo' => optional($student->parent)->guardian_photo ?? 'N/A',
                    'parent_contact' => optional($student->parent)->guardian_phone ?? 'N/A',
                    'parent_email' => optional($student->parent)->guardian_email ?? 'N/A',
                    'aadhar_number' => optional($student)->aadharcard_number ?? 'N/A',
                    'emergency_contact' => optional($student)->emergency_contact ?? 'N/A',
                    'medical_information' => optional($student)->medical_history ?? 'N/A',
                    'state' => optional($student)->state ?? 'N/A',
                    'city' => optional($student)->city ?? 'N/A',
                ];
            });

            return response()->json([
                'teacher' => [
                    'name' => $authenticatedUser->name,
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
