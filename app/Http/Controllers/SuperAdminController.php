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
        $user->roles()->attach($role);

        return redirect()->route('school.list')->with('success', 'School registered successfully');
    }

    public function listSchools()
    {
        $schools = School::with('user')->get();
        return view('superadmin.schools.list', compact('schools'));
    }

}
