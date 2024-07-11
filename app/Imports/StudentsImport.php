<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\ParentModel;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;




class StudentsImport implements ToModel, WithHeadingRow
{
    private $medium_id;
    private $class_id;
    private $section_id;
    public $results = [];
    public $stopProcessing = false;

    public function __construct($medium_id, $class_id, $section_id)
    {
        $this->medium_id = $medium_id;
        $this->class_id = $class_id;
        $this->section_id = $section_id;
    }

    public function model(array $row)
    {

        Log::info('Starting to process row', ['row' => $row]);

        Log::info('Starting to process row', ['row' => $row]);

        // Check if the row is completely empty
        if (array_filter($row) == []) {
            Log::info('Encountered blank row, stopping further processing.');
            $this->stopProcessing = true;
            return null;
        }



        try {
            $validatedData = Validator::make($row, [
                'admission_no' => 'required|unique:students,admission_no|max:255',
                'roll_number' => 'required|numeric',
                'first_name' => 'required|max:255',
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
                'student_photo' => 'nullable',
                'aadharcard_number' => 'nullable|max:12',
                'current_address' => 'nullable|max:255',
                'permanent_address' => 'nullable|max:255',
                'bank_account_number' => 'nullable|max:20',
                'bank_name' => 'nullable|max:255',
                'ifsc_code' => 'nullable|max:11',
                'father_name' => 'required|max:255',
                'father_phone' => 'required|numeric',
                'father_occupation' => 'required|max:255',
                'father_photo' => 'nullable',
                'mother_name' => 'required|max:255',
                'mother_phone' => 'nullable|numeric',
                'mother_occupation' => 'required|max:255',
                'mother_photo' => 'nullable',
                'guardian_name' => 'nullable|max:255',
                'guardian_relation' => 'nullable|max:255',
                'guardian_email' => 'required|email|max:255|unique:users,email',
                'guardian_phone' => 'nullable|numeric|digits:10',
                'guardian_occupation' => 'nullable|max:255',
                'guardian_address' => 'nullable|max:255',
                'guardian_photo' => 'nullable',
            ])->validate();

            Log::info('Validation passed', ['validatedData' => $validatedData]);

            DB::beginTransaction();

            $authUser = Auth::user();
            $school = School::where('user_id', $authUser->id)->first();
            $studentRole = Role::where('name', 'Student')->first();

            Log::info('Creating guardian user');
            // Create the user entry for guardian
            $schoolNamePrefix = strtoupper(substr($school->name, 0, 3));
            $user = new User();
            $user->name = $schoolNamePrefix . $validatedData['father_phone'] . date('Ymd', strtotime($validatedData['date_of_birth']));
            $user->email = $validatedData['guardian_email'];
            $user->password = Hash::make($validatedData['father_phone'] .'@'. $validatedData['date_of_birth']);
            $user->role_id = Role::where('name', 'Parent')->first()->id;
            $user->fcm_token = $validatedData['fcm_token'] ?? null;
            $user->save();

            Log::info('Created guardian user', ['user_id' => $user->id]);

            Log::info('Creating parent entry');
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

            Log::info('Created parent entry', ['parent_id' => $parent->id]);

            $validatedData['uid'] = strtoupper(substr($school->name, 0, 3)) . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));

            Log::info('Creating student user');
            $userStudent = new User();
            $userStudent->name = $schoolNamePrefix . $validatedData['admission_no'] . date('Ymd', strtotime($validatedData['date_of_birth']));
            $userStudent->email = $validatedData['email'];
            $userStudent->password = Hash::make($validatedData['father_phone']);
            $userStudent->role_id = Role::where('name', 'Student')->first()->id;
            $userStudent->fcm_token = $validatedData['fcm_token'] ?? null;
            $userStudent->save();

            Log::info('Created student user', ['user_id' => $userStudent->id]);

            Log::info('Creating student entry');
            // Create the student entry
            $student = new Student();
            $student->user_id = $userStudent->id;
            $student->school_id = $school->id;
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
            $student->medium_id = $this->medium_id;
            $student->class_id = $this->class_id;
            $student->section_id = $this->section_id;
            $student->save();

            Log::info('Created student entry', ['student_id' => $student->id]);
            // Log::info('Result student entry', ['student' => $student->result()]);


            DB::commit();
            Log::info('Created student', ['teacher_id' => $student->id]);

            $this->results[] = [
                'row' => $validatedData,
                'status' => 'success',
                'student' => $student
            ];

            return $student;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error importing student', [
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString()  // Logging the stack trace for better debugging
            ]);

            $this->results[] = [
                'row' => $validatedData,
                'status' => 'failed',
                'errors' => $e->getMessage()
            ];

            return null;
        }
    }
}
