<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student; // Import the Student model
use App\Models\ParentModel; // Ensure the Parent model is imported correctly
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;

class StudentController extends Controller
{
    public function create()
    {
        // Load necessary data for the form (schools, mediums, standards, classes, academic years)
        $mediums = Medium::all();
        $standards = Standard::all();
        $classes = ClassModel::all();
        return view('schooladmin.students.create', compact('mediums', 'standards', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:255',
            'studentRollId' => 'required|string|max:255',
            'admission_number' => 'required|string|max:255',
            'admission_date' => 'required|date',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:255',
            'address' => 'required|string',
            'Parents_phoneNo' => 'required|string|max:255',
            'studentAcademicYear' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'caste' => 'required|string|max:255',
            'adharcard' => 'required|string|max:255',
            'email_id' => 'required|string|email|max:255|unique:students',
            'school_id' => 'required|exists:schools,id',
            'medium_id' => 'required|exists:mediums,id',
            'standard_id' => 'required|exists:standards,id',
            'class_id' => 'required|exists:classes,id',
            'lc_document' => 'nullable|file|mimes:pdf,jpg,png',
            'adharcard_document' => 'nullable|file|mimes:pdf,jpg,png',
            'lc_number' => 'nullable|string|max:255',
        ]);

        $student = new Student();
        $student->fullName = $request->fullName;
        $student->photo = $request->photo;
        $student->studentRollId = $request->studentRollId;
        $student->admission_number = $request->admission_number;
        $student->admission_date = $request->admission_date;
        $student->birthday = $request->birthday;
        $student->gender = $request->gender;
        $student->address = $request->address;
        $student->Parents_phoneNo = $request->Parents_phoneNo;
        $student->student_mobileNo = $request->student_mobileNo;
        $student->studentAcademicYear = $request->studentAcademicYear;
        $student->religion = $request->religion;
        $student->caste = $request->caste;
        $student->uid = uniqid(); // Auto generate UID
        $student->adharcard = $request->adharcard;
        $student->email_id = $request->email_id;
        $student->school_id = $request->school_id;
        $student->medium_id = $request->medium_id;
        $student->standard_id = $request->standard_id;
        $student->class_id = $request->class_id;
        $student->lc_document = $request->lc_document->store('documents');
        $student->adharcard_document = $request->adharcard_document->store('documents');
        $student->lc_number = $request->lc_number;
        $student->firebase_token = $request->firebase_token;
        $student->save();

        return redirect()->route('students.index');
    }

    public function index()
    {
        $students = Student::paginate(10); // Adjust the number as needed
        return view('schooladmin.students.index', compact('students'));


    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('show', compact('student'));
    }
}
