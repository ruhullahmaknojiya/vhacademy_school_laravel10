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
use PhpOffice\PhpSpreadsheet\Shared\Date; // Ensure this line is present



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

            if ($this->stopProcessing || array_filter($row) == []) {
                return null;
            }

            // Convert Excel dates to PHP date format
        $dateOfBirth = isset($row['date_of_birth']) && is_numeric($row['date_of_birth'])
        ? Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d')
        : $row['date_of_birth'];

        $admissionDate = isset($row['admission_date']) && is_numeric($row['admission_date'])
        ? Date::excelToDateTimeObject($row['admission_date'])->format('Y-m-d')
        : $row['admission_date'];
            // Convert numeric values to strings
            $mobileNumber = isset($row['mobile_number']) ? (string)$row['mobile_number'] : null;
            $fatherPhone = isset($row['father_phone']) ? (string)$row['father_phone'] : null;
            $motherPhone = isset($row['mother_phone']) ? (string)$row['mother_phone'] : null;
            $guardianPhone = isset($row['guardian_phone']) ? (string)$row['guardian_phone'] : null;

            // Sanitize input data
            $category = isset($row['category']) ? strtoupper(trim($row['category'])) : null;

            // Log the keys and values being read from each row
            Log::info('Row data:', [
                'admission_no' => $row['admission_no'] ?? 'missing',
                'roll_number' => $row['roll_number'] ?? 'missing',
                'first_name' => $row['first_name'] ?? 'missing',
                'last_name' => $row['last_name'] ?? 'missing',
                'email' => $row['email'] ?? 'missing',
                'date_of_birth' => $dateOfBirth ?? 'missing',
                'mobile_number' => $mobileNumber ?? 'missing',
                'admission_date' => $admissionDate ?? 'missing',
            ]);

            // Validate the row data
            $validator = Validator::make([
                'admission_no' => $row['admission_no'],
                'roll_number' => $row['roll_number'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'gender' => $row['gender'],
                'date_of_birth' => $dateOfBirth,
                'category' => $category,
                'mobile_number' => $mobileNumber,
                'email' => $row['email'],
                'admission_date' => $admissionDate,
                'religion' => $row['religion'],
                'caste' => $row['caste'],
                'blood_group' => $row['blood_group'],
                'house' => $row['house'],
                'height' => $row['height'],
                'weight' => $row['weight'],
                'medical_history' => $row['medical_history'],
                'student_photo' => $row['student_photo'],
                'aadharcard_number' => $row['aadharcard_number'],
                'current_address' => $row['current_address'],
                'permanent_address' => $row['permanent_address'],
                'bank_account_number' => $row['bank_account_number'],
                'bank_name' => $row['bank_name'],
                'ifsc_code' => $row['ifsc_code'],
                'father_name' => $row['father_name'],
                'father_phone' => $fatherPhone,
                'father_occupation' => $row['father_occupation'],
                'father_photo' => $row['father_photo'],
                'mother_name' => $row['mother_name'],
                'mother_phone' => $motherPhone,
                'mother_occupation' => $row['mother_occupation'],
                'mother_photo' => $row['mother_photo'],
                'guardian_name' => $row['guardian_name'],
                'guardian_relation' => $row['guardian_relation'],
                'guardian_email' => $row['guardian_email'],
                'guardian_phone' => $guardianPhone,
                'guardian_occupation' => $row['guardian_occupation'],
                'guardian_address' => $row['guardian_address'],
                'guardian_photo' => $row['guardian_photo'],
            ], [
                'admission_no' => 'required|unique:students,admission_no|max:255',
                'roll_number' => 'required|numeric',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
                'category' => 'required',
                'mobile_number' => 'required|numeric|digits:10',
                'email' => 'required|email|max:255|unique:students,email',
                'admission_date' => 'required|date',
                'religion' => 'nullable|max:255',
                'caste' => 'nullable|max:255',
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
            ]);

            if ($validator->fails()) {
                Log::warning('Validation failed', ['errors' => $validator->errors()]);
                $this->results[] = [
                    'row' => $row,
                    'status' => 'failed',
                    'errors' => $validator->errors()
                ];
                return null;
            }

            DB::beginTransaction();
            try {
                $authUser = Auth::user();
                $school = School::where('user_id', $authUser->id)->first();
                if (!$school) {
                    Log::error('School not found for authenticated user', ['user_id' => $authUser->id]);
                    $this->results[] = [
                        'row' => $row,
                        'status' => 'failed',
                        'errors' => 'School not found for authenticated user'
                    ];
                    return null;
                }

                $schoolName = strtoupper(substr($school->name, 0, 3));
                $latestStudent = Student::orderBy('id', 'desc')->first();
                $uid = $schoolName . (1001 + ($latestStudent ? $latestStudent->id : 0));
                $username = $uid . str_replace('-', '', $dateOfBirth);
                $password = $uid . str_replace('-', '', $dateOfBirth) . substr($mobileNumber, 0, 2) . substr($mobileNumber, -2);
                $studentRole = Role::where('name', 'Student')->first();


                // Create the user entry
                $user = User::create([
                    'name' => $username,
                    'email' => $row['email'],
                    'password' => Hash::make($password),
                    'role_id' => $studentRole->id,
                    'fcm_token' => null
                ]);

                // Create the user entry
            $user = User::create([
                'name' => $username,
                'email' => $row['email'],
                'password' => Hash::make($password),
                'role_id' => $studentRole->id,
                'fcm_token' => null
            ]);

            // Prepare data for the student entry
            $studentData = [
                'user_id' => $user->id,
                'uid' => $uid,
                'admission_no' => $row['admission_no'],
                'roll_number' => $row['roll_number'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'gender' => $row['gender'],
                'date_of_birth' => $dateOfBirth,
                'category' => $category,
                'religion' => $row['religion'] ?? null,
                'caste' => $row['caste'] ?? null,
                'mobile_number' => $mobileNumber,
                'email' => $row['email'],
                'admission_date' => $admissionDate,
                'blood_group' => $row['blood_group'] ?? null,
                'house' => $row['house'] ?? null,
                'height' => $row['height'] ?? null,
                'weight' => $row['weight'] ?? null,
                'medical_history' => $row['medical_history'] ?? null,
                'student_photo' => $row['student_photo'] ?? null,
                'aadharcard_number' => $row['aadharcard_number'] ?? null,
                'current_address' => $row['current_address'] ?? null,
                'permanent_address' => $row['permanent_address'] ?? null,
                'bank_account_number' => $row['bank_account_number'] ?? null,
                'bank_name' => $row['bank_name'] ?? null,
                'ifsc_code' => $row['ifsc_code'] ?? null,
                'father_name' => $row['father_name'],
                'father_phone' => $fatherPhone,
                'father_occupation' => $row['father_occupation'],
                'father_photo' => $row['father_photo'] ?? null,
                'mother_name' => $row['mother_name'],
                'mother_phone' => $motherPhone ?? null,
                'mother_occupation' => $row['mother_occupation'],
                'mother_photo' => $row['mother_photo'] ?? null,
                'guardian_name' => $row['guardian_name'] ?? null,
                'guardian_relation' => $row['guardian_relation'] ?? null,
                'guardian_email' => $row['guardian_email'],
                'guardian_phone' => $guardianPhone ?? null,
                'guardian_occupation' => $row['guardian_occupation'] ?? null,
                'guardian_address' => $row['guardian_address'] ?? null,
                'guardian_photo' => $row['guardian_photo'] ?? null,
                'medium_id' => $this->medium_id,
                'class_id' => $this->class_id,
                'section_id' => $this->section_id,
                'school_id' => $school->id,
            ];

            // Remove null values for nullable fields
            $studentData = array_filter($studentData, function ($value) {
                return !is_null($value);
            });

            // Create the student entry
            $student = Student::create($studentData);

            Log::info('Created student entry', ['student_id' => $student->id]);

            DB::commit();

            $this->results[] = [
                'row' => $row,
                'status' => 'success',
                'student' => $student
            ];

            return $student;

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error importing student', ['error' => $e->getMessage()]);
            $this->results[] = [
                'row' => $row,
                'status' => 'failed',
                'errors' => $e->getMessage()
            ];
            return null;
        }
    }
}
