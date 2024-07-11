<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FeePayment;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
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


class SchoolController extends Controller
{


    // public function dashboard()
    // {
    //     return view('schooladmin.dashboard');
    // }
    public function dashboard()
    {
        // $totalFee = $this->getTotalFee();
        $events = Event::paginate(200);
        // dd($events);
        $monthlyCollectedFee = $this->getMonthlyCollectedFee();
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $parentsCount = User::where('role_id', 4)->count(); // Assuming there's a role field to identify parents
        $mediumCount = Medium::count();
        $standardCount = Standard::count();
        $classCount = ClassModel::count();
        $subjectCount = Subject::count();
        $topicCount = SubTopic::count(); // Assuming chapters are represented by SubTopic model
        $chapterCount  = Topic::count();
        $totalBoys = Student::where('gender', 'male')->count();
        $totalGirls = Student::where('gender', 'female')->count();
        return view('schooladmin.dashboard', compact(
            'monthlyCollectedFee','studentsCount',
            'teachersCount', 'parentsCount', 'mediumCount',
            'standardCount', 'classCount', 'subjectCount',
            'chapterCount', 'topicCount','totalBoys','totalGirls',
            'events'
        ));
    }

    private function getMonthlyCollectedFee()
    {
        // Implement the logic to get the monthly collected fee from FeePayment
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        return FeePayment::where('status', 'paid')
                         ->whereMonth('payment_date', $currentMonth)
                         ->whereYear('payment_date', $currentYear)
                         ->sum('amount_paid');
    }







}
