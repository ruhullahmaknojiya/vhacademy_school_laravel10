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
use Illuminate\Support\Facades\DB;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{


    public function index(Request $request)
    {
        // Retrieve all students and pass them to the view
        $mediums = Medium::all();
        $standards = Standard::all();
        $classes = ClassModel::all();
        $query = Student::query();
        //  dd($request);
        if ($request->has('medium') && $request->medium) {
            $query->whereHas('standard.medium', function ($q) use ($request) {
                $q->where('id', $request->medium);
            });
        }

        if ($request->has('standard') && $request->standard) {
            $query->whereHas('standard', function ($q) use ($request) {
                $q->where('id', $request->standard);
            });
        }

        if ($request->has('class') && $request->class) {
            $query->where('section_id', $request->class);
        }

        $students = $query->paginate(10);
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
        $validatedData = Validator::make($request->all(), [
            // Student details
            'admission_no' => 'required|unique:students,admission_no|max:255',
            'roll_number' => 'required|numeric',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'date_of_birth' => 'required|date',
            'medium_id' => 'required|exists:mediums,id',
            'class_id' => 'required|exists:standards,id',
            'section_id' => 'required|exists:classes,id',
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
            // Parent details
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
            // Document details
            'documents.*.title' => 'nullable|max:255',
            'documents.*.file' => 'nullable|file|mimes:pdf,jpeg,png,jpg,gif|max:2048',
        ])->validate();

        DB::beginTransaction();
    //  dd( $validatedData);
        try {
            $authUser = Auth::user();
            $school = School::where('user_id', $authUser->id)->first();
            $studentRole = Role::where('name', 'Student')->first();

            // Create the user entry for guardian
            $schoolNamePrefix = strtoupper(substr($school->name, 0, 3));
            $user = new User();
            $user->name = $schoolNamePrefix . $validatedData['father_phone'] . date('Ymd', strtotime($validatedData['date_of_birth']));
            $user->email = $validatedData['guardian_email'];
            $user->password = Hash::make($validatedData['father_phone'] .'@'. $validatedData['date_of_birth']);
            $user->role_id = Role::where('name', 'Parent')->first()->id;
            $user->fcm_token = $request->input('fcm_token');
            $user->save();

            // Create the parent/guardian entry
            $parent = new ParentModel();
            $parent->user_id = $user->id;
            $parent->father_name = $validatedData['father_name'];
            $parent->father_phone = $validatedData['father_phone'];
            $parent->father_occupation = $validatedData['father_occupation'];
            $parent->father_photo = $validatedData['father_photo'] ?? null;
            $parent->mother_name = $validatedData['mother_name'];
            $parent->mother_phone = $validatedData['mother_phone'] ?? null;
            $parent->mother_occupation = $validatedData['mother_occupation'];
            $parent->mother_photo = $validatedData['mother_photo'] ?? null;
            $parent->guardian_name = $validatedData['guardian_name'] ?? null;
            $parent->guardian_relation = $validatedData['guardian_relation'] ?? null;
            $parent->guardian_email = $validatedData['guardian_email'];
            $parent->guardian_phone = $validatedData['guardian_phone'] ?? null;
            $parent->guardian_occupation = $validatedData['guardian_occupation'] ?? null;
            $parent->guardian_address = $validatedData['guardian_address'] ?? null;
            $parent->guardian_photo = $validatedData['guardian_photo'] ?? null;
            $parent->save();


            $validatedData['uid'] = strtoupper(substr($school->name, 0, 3)) . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));

            $userStudent = new User();
            $userStudent->name = $schoolNamePrefix . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));
            $userStudent->email = $validatedData['email'];
            $userStudent->password = Hash::make($validatedData['father_phone']);
            $userStudent->role_id = Role::where('name', 'Student')->first()->id;
            $userStudent->fcm_token = $request->input('fcm_token');
            $userStudent->save();


            // Create the student entry
            $student = new Student();
            $student->user_id = $userStudent->id; // Set the user_id in student table $school
            $student->school_id =$school->id; // Set the user_id in student table medium_id,class_id,section_id
            $student->parent_id = $parent->id;
            $student->uid = $validatedData['uid'];
            $student->admission_no = $validatedData['admission_no'];
            $student->roll_number = $validatedData['roll_number'];
            $student->first_name = $validatedData['first_name'];
            $student->last_name = $validatedData['last_name'];
            $student->gender = $validatedData['gender'];
            $student->date_of_birth = $validatedData['date_of_birth'];
            $student->category = $validatedData['category'];
            $student->religion = $validatedData['religion'] ?? null;
            $student->caste = $validatedData['caste'] ?? null;
            $student->mobile_number = $validatedData['mobile_number'];
            $student->email = $validatedData['email'];
            $student->admission_date = $validatedData['admission_date'];
            $student->blood_group = $validatedData['blood_group'] ?? null;
            $student->house = $validatedData['house'] ?? null;
            $student->height = $validatedData['height'] ?? null;
            $student->weight = $validatedData['weight'] ?? null;
            $student->medical_history = $validatedData['medical_history'] ?? null;
            $student->student_photo = $validatedData['student_photo'] ?? null;
            $student->aadharcard_number = $validatedData['aadharcard_number'] ?? null;
            $student->current_address = $validatedData['current_address'] ?? null;
            $student->permanent_address = $validatedData['permanent_address'] ?? null;
            $student->bank_account_number = $validatedData['bank_account_number'] ?? null;
            $student->rte = $validatedData['rte'] ?? null;
            $student->bank_name = $validatedData['bank_name'] ?? null;
            $student->ifsc_code = $validatedData['ifsc_code'] ?? null;
            $student->medium_id = $validatedData['medium_id'];
            $student->class_id = $validatedData['class_id'];
            $student->section_id = $validatedData['section_id'];
            $student->save();

            // Handle documents if provided
            if ($request->has('documents')) {
                foreach ($request->documents as $index => $document) {
                    if (isset($document['file']) && $document['file']->isValid()) {
                        $fileName = time() . '_' . $document['file']->getClientOriginalName();
                        $document['file']->move(public_path('documents'), $fileName);
                        Document::create([
                            'student_id' => $student->id,
                            'title' => $document['title'],
                            'document_path' => $fileName,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('schooladmin.students.index')->with('success', 'Student created successfully.');
        } catch (\Exception $e) {
            Log::info('Created user', [$e]);
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving student data. Please try again.']);
        }
    }


    public function show($id)
    {
        $student = Student::with('parent')->findOrFail($id);
        return view('schooladmin.students.show', compact('student'));
    }



    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
            'medium_id' => 'required|exists:mediums,id',
            'class_id' => 'required|exists:standards,id',
            'section_id' => 'required|exists:classes,id',
        ]);

        $medium_id = $request->input('medium_id');
        $class_id = $request->input('class_id');
        $section_id = $request->input('section_id');

        $import = new StudentsImport($medium_id, $class_id, $section_id);
        Excel::import($import, $request->file('file'));

        return view('schooladmin.students.importexcel.import-results', ['results' => $import->results]);
    }


    public function showImportForm()
    {
        $standards = Standard::all();
        $mediums = Medium::all();
        $classes = ClassModel::all();

        return view('schooladmin.students.importexcel.import', compact('mediums', 'standards', 'classes'));
    }

}
?>
