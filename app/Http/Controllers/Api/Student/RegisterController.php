<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use App\Models\Stander;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PragmaRX\Google2FA\Google2FA;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Notifications\OTPNotification;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use App\Models\Medium;

// use App\Models\Student;



use App\Http\Controllers\Api\BaseController  as BaseController;
class RegisterController extends BaseController
{


//    public function register(Request $request)
//    {
//        // Validate the registration data
//        $validator = Validator::make($request->all(), [
//            'first_name' => 'required|string',
//            'last_name' => 'required|string',
//            'username' => 'required|string|unique:users',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|string|min:8|max:8',
//            'date_of_birth' => 'required|date',
//            'gender' => 'required|string',
//            'address' => 'required|string',
//            'admission_no' => 'required|string|unique:students',
//            'parent_contact' => 'required|string',
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
//
//
//        // Send OTP to user via SMS (use your SMS gateway or service)
//
//        return response()->json(['message' => 'OTP sent to your mobile number.'], 200);
//    }


    // public function verifyOtp(Request $request)
    // {

    //     // Validate the OTP
    //     $validator = Validator::make($request->all(), [
    //         'parent_otp' => 'required|numeric',
    //         'parent_contact' => 'required|numeric',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     // Retrieve the stored OTP from the cache
    //     $storedOtp = $this->getStoredOtp($request->parent_contact);

    //     if (!$storedOtp || $storedOtp != $request->parent_otp) {
    //         return response()->json(['error' => 'Invalid OTP'], 401);
    //     }

    //     $user = $this->createUser($request);
    //     $this->saveProfileImage($request, $user);

    //     $student = $this->createStudent($request, $user);

    //     // Optionally, clear the stored OTP from the cache
    //     $this->clearStoredOtp($request->parent_contact);


    //     // You can generate an API token or perform any other actions

    //     return response()->json(['message' => 'Registration successful.'], 200);
    // }

//    private function createUser(Request $request)
//    {
//        return  User::create([
//            'first_name' => $request->input('first_name'),
//            'last_name' => $request->input('last_name'),
//            'username' => $request->input('username'),
//            'email' => $request->input('email'),
//            'password' => Hash::make($request->input('password')),
//            'phone' => $request->input('phone'),
//            'user_type' => 'student',
//            'last_logged_in' => null,
//            'created_by' => null,
//            'school_id' => null,
//            'status' => '1',
//        ]);
//    }

//    private function saveProfileImage(Request $request, User $user)
//    {
//        if ($request->hasFile("profile")) {
//            $img = $request->file("profile");
//
//            $img->store('public/images/student/');
//            $user->profile = $img->hashName();
//            $user->save();
//        }
//    }

//    private function createStudent(Request $request, User $user)
//    {
//        // $otp = $this->generateOtp();
//        // $otpExpiry = now()->addMinutes(5);
//
//        $student = new Student([
//            'date_of_birth' => $request->input('date_of_birth'),
//            'gender' => $request->input('gender'),
//            'address' => $request->input('address'),
//            'blood_group' => $request->input('blood_group'),
//            'religion' => $request->input('religion'),
//            'caste' => $request->input('caste'),
//            'father_name' => $request->input('father_name'),
//            'father_education' => $request->input('father_education'),
//            'father_profession' => $request->input('father_profession'),
//            'father_designation' => $request->input('father_designation'),
//            'mother_name' => $request->input('mother_name'),
//            'mother_education' => $request->input('mother_education'),
//            'mother_profession' => $request->input('mother_profession'),
//            'mother_designation' => $request->input('mother_designation'),
//            'admission_no' => $request->input('admission_no'),
//            'parent_contact' => $request->input('parent_contact'),
//            'aadhar_number' => $request->input('aadhar_number'),
//            'parent_otp' => null,
//            // Hash::make($otp)
//            // 'otp_expiry' => $otpExpiry,
//            'class' => $request->input('class'),
//            'parent_email' => $request->input('parent_email'),
//            'section' => $request->input('section'),
//            'admission_date' => $request->input('admission_date'),
//            'emergency_contact' => $request->input('emergency_contact'),
//            'medical_information' => $request->input('medical_information'),
//            'other_fields' => $request->input('other_fields'),
//            'user_id' => $user->id,
//            'school_id' => null,
//        ]);
//
//        if ($request->hasFile("father_photo")) {
//            $this->handlePhotoUpload($student, 'father_photo', 'father_photo');
//    }
//
//        if ($request->hasFile("mother_photo")) {
//            $this->handlePhotoUpload($student, 'mother_photo', 'mother_photo');
//        }
//
//        $student->save();
//
//        return $student;
//    }



//    private function handlePhotoUpload(Student $student, $fileInputName, $photoField)
//    {
//        $img = request()->file($fileInputName);
//
//        if (Storage::exists('public/images/parents/' . $student->{$photoField})) {
//            Storage::delete('public/images/parents/' . $student->{$photoField});
//        }
//
//        $img->store('public/images/parents/');
//        $student->{$photoField} = $img->hashName();
//    }




    // private function generateOtp()
    // {
    //     return mt_rand(100000, 999999);
    // }

    // private function storeOtpInCache($phoneNumber, $otp)
    // {

    //     Cache::put($phoneNumber, $otp, now()->addMinutes(5));
    // }

    // private function getStoredOtp($phoneNumber)
    // {

    //     return Cache::get($phoneNumber);
    // }

    // private function clearStoredOtp($phoneNumber)
    // {
    //     Cache::forget($phoneNumber);
    // }



      public function login(Request $request)
{
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        // Authentication successful
//        $authenticatedUser =Auth::guard('api')->user();
        $user = Auth::user();

        // Retrieve the student associated with the user
        $student = Student::where('user_id', $user->id)->first();

        if ($student) {

            $success = [
                'username' => $user->name,

//                'subscription_status' => $user->subscription_status ?? null,
                'student' => [
                    'first_name' => $student->first_name,
                    'last_name' => $student->last_name,
                    'standard' => $student->standard->standard_name,
                    'medium' =>  $student->medium->medium_name,
                ],
                'token' => $user->createToken('MyApp')->accessToken,
            ];
        } else {
            // Handle the case where the user has no associated student record
            return $this->sendError('Student record not found.', ['error' => 'Student record not found.']);
        }

        return $this->sendResponse($success, 'User login successfull.');
    } else {
        // Authentication failed
        return $this->sendError('Unauthorized.', ['error' => 'Unauthorized']);
    }
}


}
