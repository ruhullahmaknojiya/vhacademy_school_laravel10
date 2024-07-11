<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\School;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Imports\TeachersImport;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        Log::info('Fetching all teachers');
        // $teachers = Teacher::with('user', 'documents')->get();
        $teachers = Teacher::get();
        Log::info('Fetched teachers', ['teacher_count' => $teachers->count()]);
        return view('schooladmin.teachers.index', compact('teachers'));
        // return view('schooladmin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        Log::info('Loading create teacher form');
        return view('schooladmin.teachers.create');
    }

    public function store(Request $request)
    {
        Log::info('Store method started', ['request_data' => $request->all()]);
        try {
            $validator = Validator::make($request->all(), [
                'designation' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'date_of_birth' => 'required|date',
                'phone' => 'required|string|max:15',
            ]);

            if ($validator->fails()) {
                Log::warning('Validation failed', ['errors' => $validator->errors()]);
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $authUser = Auth::user();
            Log::info('Authenticated user', ['user_id' => $authUser->id]);

            $school = School::where('user_id', $authUser->id)->first();
            if (!$school) {
                Log::error('School not found for authenticated user', ['user_id' => $authUser->id]);
                return redirect()->back()->with('error', 'School not found for the authenticated user.');
            }
            // $schoolName = $school->name;
            // $schoolName = str_replace(' ', '', $school->name);
            $schoolName = strtoupper(substr($school->name, 0, 3));
            Log::info('School found', ['school_name' => $schoolName]);

            $latestTeacher = Teacher::orderBy('id', 'desc')->first();
            $staffId = $schoolName . (1001 + ($latestTeacher ? $latestTeacher->id : 0));
            Log::info('Generated staff ID', ['staff_id' => $staffId]);

            $dateOfBirth = $request->input('date_of_birth');
            $username = $staffId . str_replace('-', '', $dateOfBirth);
            Log::info('Generated username', ['username' => $username]);

            $phone = $request->input('phone');
            $password = $staffId . str_replace('-', '', $dateOfBirth) . substr($phone, 0, 2) . substr($phone, -2);  /// password = Staffid + dateofbirth + first letter of mobile number + Last letter of mobile number
            Log::info('Generated password',[$password]);

            $teacherRole = Role::where('name', 'Teacher')->first();
            $user = User::create([
                'name' => $username,
                'email' => $request->input('email'),
                'password' => Hash::make($password),
                'role_id' => $teacherRole->id,
                'fcm_token' => null
            ]);
            Log::info('Created user', ['user_id' => $user->id]);


            if (!$teacherRole) {
                Log::error('Teacher role not found');
                return redirect()->back()->with('error', 'Teacher role not found.');
            }
            Log::info('Teacher role found', ['role_id' => $teacherRole->id]);

            $teacher = Teacher::create([
                'user_id' => $user->id,
                'staff_id' => $staffId,
                'school_id' =>  $school->id,
                'designation' => $request->input('designation'),
                'department' => $request->input('department'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'gender' => $request->input('gender'),
                'date_of_birth' => $dateOfBirth,
                'date_of_joining' => $request->input('date_of_joining'),
                'phone' => $phone,
                'email' => $request->input('email'),
                'emergency_contact_number' => $request->input('emergency_contact_number'),
                'marital_status' => $request->input('marital_status'),
                'photo' => $request->input('photo'),
                'current_address' => $request->input('current_address'),
                'permanent_address' => $request->input('permanent_address'),
                'qualification' => json_encode($request->input('qualification')),
                'work_experience' => $request->input('work_experience'),
                'note' => $request->input('note'),
                'pan_number' => $request->input('pan_number'),
                'epf_no' => $request->input('epf_no'),
                'contract_type' => $request->input('contract_type'),
                'basic_salary' => $request->input('basic_salary'),
                'work_shift' => $request->input('work_shift'),
                'work_location' => $request->input('work_location'),
                'date_of_leaving' => $request->input('date_of_leaving'),
                'account_title' => $request->input('account_title'),
                'bank_account_number' => $request->input('bank_account_number'),
                'bank_name' => $request->input('bank_name'),
                'ifsc_code' => $request->input('ifsc_code'),
                'bank_branch_name' => $request->input('bank_branch_name'),
                'facebook_url' => $request->input('facebook_url'),
                'twitter_url' => $request->input('twitter_url'),
                'linkedin_url' => $request->input('linkedin_url'),
                'instagram_url' => $request->input('instagram_url'),
                'role_id' => $teacherRole->id,
            ]);
            Log::info('Created teacher', ['teacher_id' => $teacher->id]);

            RoleUser::create([
                'user_id' => $user->id,
                'role_id' => $teacherRole->id,
            ]);
            Log::info('Assigned role to user', ['user_id' => $user->id, 'role_id' => $teacherRole->id]);

            return redirect()->route('schooladmin.teachers.index')->with('success', 'Teacher created successfully');
        } catch (\Exception $e) {
            Log::error('Error creating teacher', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'An error occurred while saving teacher data. Please try again.']);
        }
    }

    public function show($id)
    {
        Log::info('Showing teacher details', ['teacher_id' => $id]);
        $teacher = Teacher::with('user', 'documents')->findOrFail($id);
        return view('schooladmin.teachers.show', compact('teacher'));
    }

    public function edit($id)
    {
        Log::info('Editing teacher', ['teacher_id' => $id]);
        $teacher = Teacher::findOrFail($id);
        $roles = Role::all();
        return view('schooladmin.teachers.edit', compact('teacher', 'roles'));
    }

    public function update(Request $request, $id)
    {
        Log::info('Updating teacher', ['teacher_id' => $id, 'request_data' => $request->all()]);
        $validator = Validator::make($request->all(), [
            'designation' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'date_of_birth' => 'required|date',
            'phone' => 'required|string|max:15',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            Log::warning('Validation failed', ['errors' => $validator->errors()]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        Log::info('Teacher updated', ['teacher_id' => $teacher->id]);

        $user = $teacher->user;
        $user->name = $teacher->staff_id . str_replace('-', '', $request->input('date_of_birth'));
        $user->email = $request->input('email');
        $user->save();
        Log::info('User updated', ['user_id' => $user->id]);

        $roleUser = RoleUser::where('user_id', $user->id)->first();
        $roleUser->role_id = $request->input('role_id');
        $roleUser->save();
        Log::info('User role updated', ['user_id' => $user->id, 'role_id' => $roleUser->role_id]);

        return redirect()->route('schooladmin.teachers.index')->with('success', 'Teacher updated successfully');
    }

    public function destroy($id)
    {
        Log::info('Deleting teacher', ['teacher_id' => $id]);
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        Log::info('Teacher deleted', ['teacher_id' => $id]);

        return redirect()->route('schooladmin.teachers.index')->with('success', 'Teacher deleted successfully');
    }



    public function import(Request $request)
    {
        $validatedData = $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Log::info('Starting import');
            $import = new TeachersImport();
            Excel::import($import, $request->file('file')->store('temp'));
            Log::info('Import successful');
            if ($import->stopProcessing) {
                Log::info('Import stopped due to blank row.');
                return view('schooladmin.teachers.importexcel.import_results', ['results' => $import->results, 'message' => 'Import stopped due to blank row.']);
                // return view('schooladmin.teachers.importexcel.import_results', ['results' => $import->results]);

            }
            Log::info('Import successful');
            return view('schooladmin.teachers.importexcel.import_results', ['results' => $import->results]);
        } catch (\Exception $e) {
            Log::error('Error in import controller', ['error' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            return back()->with('error', 'There was an error importing the teachers.');
        }
    }

    public function showImportForm()
    {
        return view('schooladmin.teachers.importexcel.import');
    }


}
