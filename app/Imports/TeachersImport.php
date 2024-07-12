<?php

namespace App\Imports;

use App\Models\Teacher;
use App\Models\User;
use App\Models\Role;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use PhpOffice\PhpSpreadsheet\Shared\Date; // Ensure this line is present


class TeachersImport implements ToModel, WithHeadingRow
{
    public $results = [];
    public $stopProcessing = false;

    public function model(array $row)
    {
        Log::info('Starting to process row', ['row' => $row]);

        // Check if the row is completely empty
        if (array_filter($row) == []) {
            Log::info('Encountered blank row, stopping further processing.');
            $this->stopProcessing = true;
            return null;
        }

        // Convert Excel dates to PHP date format
        $dateOfBirth = isset($row['date_of_birth']) ? Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-m-d') : null;
        $dateOfJoining = isset($row['date_of_joining']) ? Date::excelToDateTimeObject($row['date_of_joining'])->format('Y-m-d') : null;
        $dateOfLeaving = isset($row['date_of_leaving']) ? Date::excelToDateTimeObject($row['date_of_leaving'])->format('Y-m-d') : null;

        // Convert numeric values to strings
        $phone = isset($row['phone']) ? (string)$row['phone'] : null;
        $emergencyContactNumber = isset($row['emergency_contact_number']) ? (string)$row['emergency_contact_number'] : null;

        // Sanitize marital_status
        $maritalStatus = isset($row['marital_status']) ? strtoupper(trim($row['marital_status'])) : null;

        // Log the keys and values being read from each row
        Log::info('Row data:', [
            'designation' => $row['designation'] ?? 'missing',
            'department' => $row['department'] ?? 'missing',
            'first_name' => $row['first_name'] ?? 'missing',
            'last_name' => $row['last_name'] ?? 'missing',
            'email' => $row['email'] ?? 'missing',
            'date_of_birth' => $dateOfBirth ?? 'missing',
            'phone' => $phone ?? 'missing',
            'marital_status' => $maritalStatus ?? 'missing',
        ]);

        // Validate the row data
        $validator = Validator::make([
            'designation' => $row['designation'],
            'department' => $row['department'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'date_of_birth' => $dateOfBirth,
            'phone' => $phone,
            'marital_status' => $maritalStatus,
        ], [
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:15',
            'marital_status' => 'nullable|string|max:255',
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
            $latestTeacher = Teacher::orderBy('id', 'desc')->first();
            $staffId = $schoolName . (1001 + ($latestTeacher ? $latestTeacher->id : 0));
            $username = $staffId . str_replace('-', '', $dateOfBirth);
            $password = $staffId .'@'.$phone;
            Log::error($username, ['password' => $password]);
            $teacherRole = Role::where('name', 'Teacher')->first();

            // Create the user entry
            $user = User::create([
                'name' => $username,
                'email' => $row['email'],
                'password' => Hash::make($password),
                'role_id' => $teacherRole->id,
                'fcm_token' => null
            ]);

            // Prepare data for the teacher entry
            $teacherData = [
                'user_id' => $user->id,
                'staff_id' => $staffId,
                'school_id' => $school->id,
                'designation' => $row['designation'],
                'department' => $row['department'],
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'father_name' => $row['father_name'] ?? null,
                'mother_name' => $row['mother_name'] ?? null,
                'gender' => $row['gender'],
                'date_of_birth' => $dateOfBirth,
                'date_of_joining' => $dateOfJoining,
                'phone' => $phone,
                'email' => $row['email'],
                'emergency_contact_number' => $emergencyContactNumber,
                'marital_status' => $maritalStatus,
                'photo' => $row['photo'] ?? null,
                'current_address' => $row['current_address'],
                'permanent_address' => $row['permanent_address'],
                'qualification' => json_encode($row['qualification']),
                'work_experience' => $row['work_experience'] ?? null,
                'note' => $row['note'] ?? null,
                'pan_number' => $row['pan_number'] ?? null,
                'epf_no' => $row['epf_no'] ?? null,
                'contract_type' => $row['contract_type'],
                'basic_salary' => $row['basic_salary'],
                'work_shift' => $row['work_shift'],
                'work_location' => $row['work_location'],
                'date_of_leaving' => $dateOfLeaving,
                'account_title' => $row['account_title'] ?? null,
                'bank_account_number' => $row['bank_account_number'] ?? null,
                'bank_name' => $row['bank_name'] ?? null,
                'ifsc_code' => $row['ifsc_code'] ?? null,
                'bank_branch_name' => $row['bank_branch_name'] ?? null,
                'facebook_url' => $row['facebook_url'] ?? null,
                'twitter_url' => $row['twitter_url'] ?? null,
                'linkedin_url' => $row['linkedin_url'] ?? null,
                'instagram_url' => $row['instagram_url'] ?? null,
                'role_id' => $teacherRole->id,
            ];

            // Remove null values for nullable fields
            $teacherData = array_filter($teacherData, function ($value) {
                return !is_null($value);
            });

            // Create the teacher entry
            $teacher = Teacher::create($teacherData);

            DB::commit();
            Log::info('Created teacher', ['teacher_id' => $teacher->id]);

            $this->results[] = [
                'row' => $row,
                'status' => 'success',
                'teacher' => $teacher
            ];

            return $teacher;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error importing teacher', ['error' => $e->getMessage()]);
            $this->results[] = [
                'row' => $row,
                'status' => 'failed',
                'errors' => $e->getMessage()
            ];
            return null;
        }
    }
}
