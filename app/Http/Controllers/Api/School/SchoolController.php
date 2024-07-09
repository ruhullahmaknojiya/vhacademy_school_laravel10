<?php

namespace App\Http\Controllers\Api\School;

use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    //
    public function login(Request $request)
    {

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role_id' => 2])) {
            // Authentication successful
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            // Retrieve the student associated with the user
            $school = School::where('user_id', $user->id)->get();

            if ($school) {
                // Retrieve the standard using the student's standard_id
                // $standard = Stander::where('status','1')->with('Subject.topic.subtopic')->get();

                // Retrieve the medium using the standard's medium_id
                // $medium = Medium::where('id', $standard->medium_id)
                //     ->pluck('name')
                //     ->first();

                // 'token' => $user->createToken('MyApp')->accessToken,

            }
            //  else {
            //     // Handle the case where the user has no associated student record
            //     return $this->sendError('Student record not found.', ['error' => 'Student record not found.']);
            // }
            return response()->json([
                'token' => $token,
                'user' => $user,
                'teacher' => $school,
                'message' => 'User login successfull',
            ], 200);
            // return $this->sendResponse($success, 'User login successfull.');
        } else {
            // Authentication failed
            return response()->json([
                'message' => 'Invalid credentials or user not found',
            ], 401);
        }
    }
}
