<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\FeeAssignment;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\FeeGroup;
use App\Models\FeesMaster;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Topic;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SuperAdminController extends Controller
{


    public function dashboard()
    {
         if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }

         // $totalFee = $this->getTotalFee();
         $events = Event::where('school_id',null)->paginate(200);
      
         $schools = School::count();
         $studentsCount = Student::count();
         $teachersCount = Teacher::count();
         $parentsCount = User::where('role_id', 4)->count(); // Assuming there's a role field to identify parents
         $mediumCount = Medium::count();
         $standardCount = Standard::count();
         $classCount = ClassModel::count();
         $subjectCount = Subject::count();
         $topicCount = SubTopic::count(); // Assuming chapters are represented by SubTopic model
         $chapterCount  = Topic::count();
         $totalBoys = Student::whereIn('gender', ['male', 'Male', 'm', 'M'])->count();
         $totalGirls = Student::whereIn('gender', ['female', 'Female', 'f', 'F'])->count();
         return view('superadmin.dashboard', compact(
             'schools','studentsCount',
             'teachersCount', 'parentsCount', 'mediumCount',
             'standardCount', 'classCount', 'subjectCount',
             'chapterCount', 'topicCount','totalBoys','totalGirls',
             'events'
         ));

        return view('superadmin.dashboard');
    }
    
    
     public function updateEventDate(Request $request)
    {
        Log::info('Update Event Date Request: ', $request->all());

        try {
            // Validate the request
            $request->validate([
                'id' => 'required|exists:events,id',
                'start_date' => 'required|date_format:Y-m-d H:i:s',
                'end_date' => 'nullable|date_format:Y-m-d H:i:s' // end_date can be null
            ]);

            // Find the event by ID
            $event = Event::find($request->id);

            if ($event) {
                // Update the start and end dates
                $event->start_date = $request->start_date;
                $event->end_date = $request->end_date;
                $event->save();

                return response()->json(['success' => 'Event dates updated successfully.']);
            }

            return response()->json(['error' => 'Event not found.'], 404);
        } catch (\Exception $e) {
            Log::error('Error updating event dates: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    
    
    
    
    
    public function profile()
    {
        return view('superadmin.profile');
    }

    public function settings()
    {
        return view('superadmin.settings');
    }

     // Add this method to display the school registration form
     public function registerSchoolForm()
     {
         return view('superadmin.schools.register');
     }

     public function registerSchool(Request $request)
     {
         $validatedData = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'school_name' => 'required|string|max:255',
             'address' => 'required|string|max:255',
             'phone' => 'required|string|max:15',
         ]);

         $user = User::create([
             'name' => $validatedData['name'],
             'email' => $validatedData['email'],
             'password' => bcrypt($validatedData['password']),
         ]);

         $school = School::create([
             'user_id' => $user->id,
             'name' => $validatedData['school_name'],
             'address' => $validatedData['address'],
             'phone' => $validatedData['phone'],
         ]);

         $role = Role::where('name', 'SchoolAdmin')->first();
         $user->role_id = $role->id;
        $user->save();
        $user->roles()->attach($role->id, ['created_at' => now(), 'updated_at' => now()]);

        //  $user->roles()->attach($role);

         return redirect()->route('school.list')->with('success', 'School registered successfully');
     }

    public function listSchools()
    {
        $schools = School::paginate(10); // Adjust the number as needed
        return view('superadmin.schools.list', compact('schools'));


    }


    public function editSchoolForm(School $school)
    {
        return view('schools.edit', compact('school'));
    }

    // Method to disable a school
    public function disableSchool(School $school)
    {
        // Assuming there is an 'is_disabled' column in the schools table
        $school->update(['is_disabled' => true]);
        return redirect()->route('schools.index')->with('success', 'School has been disabled.');
    }

    public function show($id)
{
    $school = School::findOrFail($id);
    return view('superadmin.schools.show', compact('school'));
}

}
