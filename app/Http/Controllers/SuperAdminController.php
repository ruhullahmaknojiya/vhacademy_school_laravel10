<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function dashboard()
    {

        return view('superadmin.dashboard');
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
