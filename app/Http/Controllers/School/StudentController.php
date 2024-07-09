<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Import the Student model
use App\Models\ParentModel; // Ensure the Parent model is imported correctly
use App\Models\Medium;
use App\Models\Standard;
use App\Models\School;
use App\Models\ClassModel;
use App\Models\Document;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{


    public function index()
    {
        // Retrieve all students and pass them to the view
        $mediums = Medium::all();
        $standards = Standard::all();
        $classes = ClassModel::all();
        $students = Student::paginate(10);
        return view('schooladmin.students.index', compact('mediums', 'standards', 'classes','students'));
    }


    public function create()
    {
        $mediums = Medium::all();
        $standard = Standard::all(); // Use the actual model name for the class
        $classes = ClassModel::all();
        return view('schooladmin.students.create',compact('mediums', 'standard', 'classes'));
    }

    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $validatedData = Validator::make($request->all(),[
                // Student details
                'admission_no' => 'required|unique:students,admission_no|max:255',
                'roll_number' => 'required|numeric',
                'first_name' => 'required|max:255',
                'medium_id' => 'required|exists:mediums,id',
                'class_id' => 'required|exists:standards,id',
                'section_id' => 'required|exists:classes,id',
                'last_name' => 'required|max:255',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
                'category' => 'required',
                'religion' => 'nullable|max:255',
                'caste' => 'nullable|max:255',
                'mobile_number' => 'required|numeric|digits:10',
                'email' => 'required|email|max:255|unique:students,email',
                'admission_date' => 'required|date',
                'blood_group' => 'nullable|max:5',
                'house' => 'nullable|max:255',
                'height' => 'nullable|numeric',
                'weight' => 'nullable|numeric',
                'medical_history' => 'nullable|max:1000',
                'student_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'aadharcard_number' => 'nullable|max:12',
                'current_address' => 'nullable|max:255',
                'permanent_address' => 'nullable|max:255',
                'bank_account_number' => 'nullable|max:20',
                'bank_name' => 'nullable|max:255',
                'ifsc_code' => 'nullable|max:11',
                'father_name' => 'required|max:255',
                'father_phone' => 'required|numeric',
                'father_occupation' => 'required|max:255',
                'father_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'mother_name' => 'required|max:255',
                'mother_phone' => 'nullable|numeric',
                'mother_occupation' => 'required|max:255',
                'mother_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'guardian_name' => 'nullable|max:255',
                'guardian_relation' => 'nullable|max:255',
                'guardian_email' => 'required|email|max:255|unique:users,email',
                'guardian_phone' => 'nullable|numeric|digits:10',
                'guardian_occupation' => 'nullable|max:255',
                'guardian_address' => 'nullable|max:255',
                'guardian_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'documents.*.title' => 'nullable|max:255',
                'documents.*.file' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048',
            ], ['admission_no.required' => 'The admission number is required.',
                'admission_no.unique' => 'This admission number is already taken.',
                'admission_no.max' => 'The admission number must not exceed 255 characters.',
                'roll_number.required' => 'The roll number is required.',
                'roll_number.numeric' => 'The roll number must be a number.',
                'medium_id.required' => 'The medium is required.',
                'medium_id.exists' => 'The selected medium is invalid.',
                'class_id.required' => 'The class is required.',
                'class_id.exists' => 'The selected class is invalid.',
                'section_id.required' => 'The section is required.',
                'section_id.exists' => 'The selected section is invalid.',
                'first_name.required' => 'The first name is required.',
                'first_name.max' => 'The first name must not exceed 255 characters.',
                'last_name.max' => 'The last name must not exceed 255 characters.',
                'gender.required' => 'The gender is required.',
                'date_of_birth.required' => 'The date of birth is required.',
                'date_of_birth.date' => 'The date of birth must be a valid date.',
                'category.required' => 'The category is required.',
                'religion.max' => 'The religion must not exceed 255 characters.',
                'caste.max' => 'The caste must not exceed 255 characters.',
                'mobile_number.required' => 'The mobile number is required.',
                'mobile_number.numeric' => 'The mobile number must be a number.',
                'mobile_number.digits' => 'The mobile number must be exactly 10 digits.',
                'email.required' => 'The email is required.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email is already taken.',
                'email.max' => 'The email must not exceed 255 characters.',
                'admission_date.required' => 'The admission date is required.',
                'admission_date.date' => 'The admission date must be a valid date.',
                'blood_group.max' => 'The blood group must not exceed 5 characters.',
                'house.max' => 'The house must not exceed 255 characters.',
                'height.numeric' => 'The height must be a number.',
                'weight.numeric' => 'The weight must be a number.',
                'medical_history.max' => 'The medical history must not exceed 1000 characters.',
                'student_photo.image' => 'The student photo must be an image.',
                'student_photo.mimes' => 'The student photo must be a file of type: jpeg, png, jpg, gif.',
                'student_photo.max' => 'The student photo must not exceed 2048 KB.',
                'aadharcard_number.max' => 'The Aadhar card number must not exceed 12 characters.',
                'current_address.max' => 'The current address must not exceed 255 characters.',
                'permanent_address.max' => 'The permanent address must not exceed 255 characters.',
                'bank_account_number.max' => 'The bank account number must not exceed 20 characters.',
                'bank_name.max' => 'The bank name must not exceed 255 characters.',
                'ifsc_code.max' => 'The IFSC code must not exceed 11 characters.',
                'father_name.max' => 'The father name must not exceed 255 characters.',
                'father_phone.numeric' => 'The father phone must be a number.',
                'father_occupation.max' => 'The father occupation must not exceed 255 characters.',
                'father_photo.image' => 'The father photo must be an image.',
                'father_photo.mimes' => 'The father photo must be a file of type: jpeg, png, jpg, gif.',
                'father_photo.max' => 'The father photo must not exceed 2048 KB.',
                'mother_name.max' => 'The mother name must not exceed 255 characters.',
                'mother_phone.numeric' => 'The mother phone must be a number.',
                'mother_occupation.max' => 'The mother occupation must not exceed 255 characters.',
                'mother_photo.image' => 'The mother photo must be an image.',
                'mother_photo.mimes' => 'The mother photo must be a file of type: jpeg, png, jpg, gif.',
                'mother_photo.max' => 'The mother photo must not exceed 2048 KB.',
                'guardian_name.required' => 'The guardian name is required.',
                'guardian_name.max' => 'The guardian name must not exceed 255 characters.',
                'guardian_relation.required' => 'The guardian relation is required.',
                'guardian_relation.max' => 'The guardian relation must not exceed 255 characters.',
                'guardian_email.required' => 'The guardian email is required.',
                'guardian_email.email' => 'Please enter a valid email address.',
                'guardian_email.unique' => 'This guardian email is already taken.',
                'guardian_email.max' => 'The guardian email must not exceed 255 characters.',
                'guardian_phone.required' => 'The guardian phone is required.',
                'guardian_phone.numeric' => 'The guardian phone must be a number.',
                'guardian_phone.digits' => 'The guardian phone must be exactly 10 digits.',
                'guardian_occupation.max' => 'The guardian occupation must not exceed 255 characters.',
                'guardian_address.max' => 'The guardian address must not exceed 255 characters.',
                'guardian_photo.image' => 'The guardian photo must be an image.',
                'guardian_photo.mimes' => 'The guardian photo must be a file of type: jpeg, png, jpg, gif.',
                'guardian_photo.max' => 'The guardian photo must not exceed 2048 KB.',
                'documents.*.title.max' => 'The document title must not exceed 255 characters.',
                'documents.*.file.file' => 'The document file must be a file.',
                'documents.*.file.mimes' => 'The document file must be a file of type: pdf, jpeg, png, jpg, gif.',
                'documents.*.file.max' => 'The document file must not exceed 2048 KB.',
            ]);
            Log::error('Validation Errors:', $errors);

            Log::info('Request Data:', $request->all());

            if ($validator->fails()) {
                Log::error('Validation Errors:', $validator->errors()->toArray());
                return redirect()->back()->withErrors($validator)->withInput();
            }


            Log::info('Problem is', [$validator->fails]);
        if ($request->hasFile('student_photo')) {
            $studentPhotoName = time().'.'.$request->student_photo->extension();
            $request->student_photo->move(public_path('images/students'), $studentPhotoName);
            $validatedData['student_photo'] = $studentPhotoName;
        }
        // dd(Auth::user()->id);
        $school = School::where('user_id', Auth::user()->id)->first();
        Log::info('Validation Data', [$school]);

        // $school = Auth::user()->school;
        $validatedData['school_id'] = $school->id;

        Log::info('Validation Data', [$validatedData['school_id']]);

        $validatedData['uid'] = strtoupper(substr($school->name, 0, 3)) . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));

        Log::info('Validation Data', [$validatedData['uid']]);

// Proceed with storing data if validation passes
        $student = new Student($validatedData);
        $student->save();
        // $student = Student::create($validatedData);
        Log::info('StudentController@store: Student record created', ['student' => $student]);

         // Fetch role IDs
         $studentRole = Role::where('name', 'student')->first();
         $parentRole = Role::where('name', 'Parent')->first();

         // Create student user
         $studentUsername = $student->uid . '-' . Auth::user()->name . '-' . $student->admission_no;
         $studentPassword = Hash::make($student->first_name . $student->date_of_birth . $student->mobile_number);

         User::create([
            'name' => $student->uid,
            'email' => $student->email,
            'password' => $studentPassword,
            'role_id' => $studentRole->id,
            'fcm_token' => null,
        ]);




        $parentDetail = ParentModel::create([
            'student_id' => $student->id,
            'father_name' => $validatedData['father_name'],
            'father_phone' => $validatedData['father_phone'],
            'father_occupation' => $validatedData['father_occupation'],
            'father_photo' => $validatedData['father_photo'] ?? null,
            'mother_name' => $validatedData['mother_name'],
            'mother_phone' => $validatedData['mother_phone'] ?? null,
            'mother_occupation' => $validatedData['mother_occupation'],
            'mother_photo' => $validatedData['mother_photo'] ?? null,
            'guardian_name' => $validatedData['guardian_name'],
            'guardian_relation' => $validatedData['guardian_relation'],
            'guardian_email' => $validatedData['guardian_email'],
            'guardian_phone' => $validatedData['guardian_phone'],
            'guardian_occupation' => $validatedData['guardian_occupation'] ?? null,
            'guardian_address' => $validatedData['guardian_address'] ?? null,
            'guardian_photo' => $validatedData['guardian_photo'] ?? null,
        ]);

          // Create parent user
          $validatedData['uid'] = strtoupper(substr($school->name, 0, 3)) . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));

          $parentUsername = strtoupper(substr($school->name, 0, 3)) . date('Ymd', strtotime($student->date_of_birth)) . $request->father_phone;
          $parentPassword = Hash::make($request->guardian_name . $request->guardian_phone . $student->uid . $student->date_of_birth);

          User::create([
              'name' => $parentUsername,
              'email' => $request->guardian_email,
              'password' => $parentPassword,
              'role_id' => $parentRole->id,
              'fcm_token' => $request->fcm_token,
          ]);

        if ($request->has('documents')) {
            foreach ($request->documents as $index => $document) {
                if (isset($document['document_path']) && $document['document_path']->isValid()) {
                    $fileName = time().'_'.$document['file']->getClientOriginalName();
                    $document['document_path']->move(public_path('documents'), $fileName);
                    Document::create([
                        'student_id' => $student->id,
                        'title' => $document['title'],
                        'document_path' => $fileName,
                    ]);
                }
            }
        }


        return redirect()->route('schooladmin.students.index')->with('success', 'Student created successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => 'An error occurred while saving student data. Please try again.']);
    }
    }


    public function show($id)
    {
        $student = Student::with('parent')->findOrFail($id);
        return view('schooladmin.students.show', compact('student'));
    }
}
?>
