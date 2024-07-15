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



      public function login(Request $request)
{
    if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role_id' => 5])) {
     
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
                    'medium' =>  $student->medium->medium_name,
                    'standard' =>  $student->standard->standard_name,
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
