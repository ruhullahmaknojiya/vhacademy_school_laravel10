<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\SubTopic;
use App\Models\Topic;
use App\Models\Event;
use App\Models\Holiday;
use App\Models\ParentModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class SchoolController extends Controller
{


    // public function dashboard()
    // {
    //     return view('schooladmin.dashboard');
    // }
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Session expired, please log in again.');
        }

        $authUser = Auth::user();
        $school = School::where('user_id', $authUser->id)->first();

        if (!$school) {
            return redirect()->route('login')->with('error', 'Authenticated user is not associated with any school.');
        }

        // Retrieve events with pagination
        $events = Event::where('school_id', $school->id)->paginate(200);

        // Retrieve holidays
        $holidays = Holiday::where('school_id', $school->id)->get();

        // Calculate monthly collected fee (assuming this method exists and is school-specific)
        $monthlyCollectedFee = 0;

        // Count entities associated with the school
        $studentsCount = Student::where('school_id', $school->id)->count();
        $teachersCount = Teacher::where('school_id', $school->id)->count();
        $parentsCount = ParentModel::whereHas('students', function ($query) use ($school) {
            $query->where('school_id', $school->id);
        })->count();

        $totalBoys = Student::where('school_id', $school->id)->whereIn('gender', ['male', 'Male', 'm', 'M'])->count();
        $totalGirls = Student::where('school_id', $school->id)->whereIn('gender', ['female', 'Female', 'f', 'F'])->count();

        // Other counts (assuming these are not school-specific, adjust if needed)
        $mediumCount = Medium::count();
        $standardCount = Standard::count();
        $classCount = ClassModel::count();
        $subjectCount = Subject::count();
        $topicCount = SubTopic::count(); // Assuming chapters are represented by SubTopic model
        $chapterCount = Topic::count();

        return view('schooladmin.dashboard', compact(
            'events',
            'holidays',
            'monthlyCollectedFee',
            'studentsCount',
            'teachersCount',
            'parentsCount',
            'mediumCount',
            'standardCount',
            'classCount',
            'subjectCount',
            'topicCount',
            'chapterCount',
            'totalBoys',
            'totalGirls'
        ));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('error', 'SuperAdmin Logout Successfully.');
    }
}
