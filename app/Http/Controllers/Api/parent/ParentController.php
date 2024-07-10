<?php

namespace App\Http\Controllers\Api\parent;

use App\Http\Controllers\Controller;
use App\Models\ParentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Api\BaseController  as BaseController;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
class ParentController extends BaseController
{




    public function getdata()
    {
        // Get the authenticated user
        $authenticatedUser =Auth::guard('api')->user();
// dd($authenticatedUser);
        // If user is authenticated, fetch user and guardian data
        if ($authenticatedUser) {
            // Fetch user and guardian data for the authenticated user
            $user = $authenticatedUser->load('parent');

            return response()->json([
                'user' => $user,
            ], 200);
        } else {
            // If user is not authenticated, return unauthorized error
            return response()->json(['error' => 'Unauthorized.'], 403);
        }
    }

//    public function register(Request $request)
//    {
//        // Validate the registration data
//        $validator = Validator::make($request->all(), [
//            'first_name' => 'required|string',
//            'last_name' => 'required|string',
//            'username' => 'required|string|unique:users',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|string|min:8|max:8',
//            // 'date_of_birth' => 'required|date',
//            'gender' => 'required|string',
//            'address' => 'required|string',
//            'country' => 'required|string',
//            'state' => 'required|string',
//            'city' => 'required|string',
//            // 'admission_no' => 'required|string|unique:students',
//            'phone' => 'required|string',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json(['error' => $validator->errors()], 400);
//        }
//        // Generate and store OTP
//        // $otp = $this->generateOtp();
//        // $this->storeOtpInCache($request->parent_contact, $otp);
//
//        // Send OTP to user via SMS
//        // $this->sendOtpViaSms($request->parent_contact, $otp);
//
//        $user = $this->createUser($request);
//        $this->saveProfileImage($request, $user);
//
//        $parent = $this->createParent($request, $user);
//
//        // $this->createParent($request,$user);
//
//        // Send OTP to user via SMS (use your SMS gateway or service)
//
//        return response()->json(['message' => 'Registration successful.'], 200);
//    }
//    private function createUser(Request $request)
//    {
//        return User::create([
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'username' => $request->input('username'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//            'phone' => $request->input('phone'),
//            'user_type' => 'parent',
//            'last_logged_in' => null,
//            'created_by' => null,
//            'school_id' => null,
//            'status' => '1',
//        ]);
//    }
//    private function createParent(Request $request, User $user)
//    {
//        $parent = new ParentModel([
//            'country' => $request->input('country'),
//            'city' => $request->input('city'),
//            'state' => $request->input('state'),
//            'address' => $request->input('address'),
//            'phone' => $request->input('phone'), // assuming 'phone' is the parent's phone
//            'profession' => $request->input('profession'),
//            'gender' => $request->input('gender'),
//            'Zip_code' => $request->input('Zip_code'),
//            'parent_number' => $request->input('parent_number'),
//        ]);
//
//        $user->guardian()->save($parent);
//
//        return $parent;
//    }

//    private function saveProfileImage(Request $request, User $user)
//    {
//        if ($request->hasFile("profile")) {
//            $img = $request->file("profile");
//
//            $img->store('public/images/parent/');
//            $user->profile = $img->hashName();
//            $user->save();
//        }
//    }



    public function login(Request $request)
    {

        if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role_id' => 4])) {
            // Authentication successful
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;

            // Retrieve the student associated with the user
            $parent = ParentModel::where('user_id', $user->id)->get();

            if ($parent) {
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
                'Parent' => $parent,
                'message' => 'parent login successfull',
            ], 200);
            // return $this->sendResponse($success, 'User login successfull.');
        } else {
            // Authentication failed
            return response()->json([
                'message' => 'Invalid credentials or user not found',
            ], 401);
        }
    }




// public function update(Request $request)
//{
//    // Get the authenticated user
//    $user = Auth::user();
//
//    // Validate the update data
//    $validator = Validator::make($request->all(), [
//        'first_name' => 'required|string',
//        'last_name' => 'required|string',
//        'username' => 'required|string|unique:users,username,'.$user->id,
//        'gender' => 'required|string',
//        'address' => 'required|string',
//        'country' => 'required|string',
//        'state' => 'required|string',
//        'city' => 'required|string',
//        // 'phone' => 'required|string',
//    ]);
//
//    if ($validator->fails()) {
//        return response()->json(['error' => $validator->errors()], 400);
//    }
//
//    // Update user information
//    $this->updateUser($request, $user);
//    $parent = $user->guardian;
//    $this->updateParent($request, $parent);
//
//    // Update profile image if provided
//    $this->ssaveProfileImage($request, $user);
//
//    // Fetch updated user data
//    $updatedUser = User::with('guardian')->find($user->id);
//
//    return response()->json(['message' => 'User and parent information updated successfully.', 'user' => $updatedUser], 200);
//}


//    private function updateUser(Request $request, User $user)
//    {
//        // Update user fields
//        $user->update([
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'username' => $request->input('username'),
//            // 'email' => $request->input('email'),
//            // Add other fields as needed...
//        ]);
//    }
//
//    private function updateParent(Request $request, ParentModel $parent)
//    {
//        // Update parent fields
//        $parent->update([
//            'country' => $request->input('country'),
//            'city' => $request->input('city'),
//            'state' => $request->input('state'),
//            'address' => $request->input('address'),
//            'profession' => $request->input('profession'),
//            'gender' => $request->input('gender'),
//            'Zip_code' => $request->input('Zip_code'),
//            'parent_number' => $request->input('parent_number'),
//            // Add other fields as needed...
//        ]);
//    }
//
//    private function ssaveProfileImage(Request $request, User $user)
//    {
//        if ($request->hasFile("profile")) {
//            $img = $request->file("profile");
//
//            $img->store('public/images/parent/');
//            $user->profile = $img->hashName();
//            $user->save();
//        }
//    }
//
//    public function changePassword(Request $request)
//{
//    // Get the authenticated user
//    $user = Auth::user();
//
//    // Validate the request data
//    $validator = Validator::make($request->all(), [
//        'old_password' => 'required|string',
//        'new_password' => 'required|string|min:8|max:255|different:old_password',
//        'confirm_new_password' => 'required|string|same:new_password',
//    ]);
//
//    if ($validator->fails()) {
//        return response()->json(['error' => $validator->errors()], 400);
//    }
//
//    // Verify if the old password matches the user's current password
//    if (!Hash::check($request->old_password, $user->password)) {
//        return response()->json(['error' => 'The provided old password is incorrect.'], 400);
//    }
//
//    // Update the user's password
//    $user->password = Hash::make($request->new_password);
//    $user->save();
//
//    return response()->json(['message' => 'Password updated successfully.'], 200);
//}



}
