<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use App\Models\MasterFeeCategory;
use App\Models\FeeCategory;
use App\Models\Standard;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Medium;
use App\Models\Payment;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FeeManagementController extends Controller
{
    // Manage Master Fee Categories - Create and List in the Same View
    public function manageMasterFeeCategories()
    {
        $categories = MasterFeeCategory::with('feeCategories')->get();
        return view('schooladmin.feemanagement.master_fee_categories.manage', compact('categories'));
    }


    public function storeMasterFeeCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'payment_type' => 'required|in:full,emi',
            'installments' => 'nullable|integer|min:1',
            'installment_amount' => 'nullable|numeric|min:0',
            'description' => 'nullable|string|max:1000',
        ]);

        MasterFeeCategory::create($validatedData);

        return redirect()->route('feemanagement.manageMasterFeeCategories')
            ->with('success', 'Master Fee Category Created Successfully');
    }




    public function showFeeCategories()
    {

        $emsClasses = Standard::where('medium_id', 3)->get();


        $gmsClasses = Standard::where('medium_id', 4)->get();

        // Pass the data to the view
        return view('schooladmin.feemanagement.fee_categories.index', compact('emsClasses', 'gmsClasses'));


    }

    public function fetchStandards(Request $request)
    {
        $mediumId = $request->input('medium_id');


        $standards = Standard::where('medium_id', $mediumId)->get();


        return response()->json([
            'standards' => $standards
        ]);
    }




    public function fetchStudents($standardId)
    {
        // Get all students for the given standard (class_id)
        $students = Student::with('standard', 'medium')->where('class_id', $standardId)->get();



        $master_fee_categories = MasterFeeCategory::all(['category_name']);


        // Get the total fees for the class
        $totalFeesClassWise = FeeCategory::where('class_id', $standardId)->sum('amount') ?: 0;

        // Initialize paid_amount and due_amount arrays for each student
        $studentsWithFees = $students->map(function ($student) use ($totalFeesClassWise) {
            // Get the total paid amount for this specific student
            $paidAmount = Payment::where('student_id', $student->id)->sum('paid_amount');

            // Calculate due amount based on total fees minus paid amount
            $dueAmount = $totalFeesClassWise - $paidAmount;

            // Add the calculated due_amount and paid_amount to the student data
            $student->paid_amount = $paidAmount;
            $student->due_amount = $dueAmount;

            return $student;
        });

        // Get the total paid amount for all students (if you need it for other purposes)
        $totalPaidAmount = Payment::where('class_id', $standardId)
            ->sum('paid_amount');

        // dd($totalPaidAmount);

        // Calculate the total due amount for all students (class-wide)
        $totalDueAmount = $totalFeesClassWise - $totalPaidAmount;



        return response()->json([
            'status' => true,
            'message' => 'Student Records Fetched Successfully',
            'students' => $studentsWithFees,
            'totalFeesClassWise' => $totalFeesClassWise,
            'totalPaidAmount' => $totalPaidAmount,
            'totalDueAmount' => $totalDueAmount,
            'master_fee_categories' => $master_fee_categories
        ]);
    }


    public function manageFeeCategories()
    {
        // Retrieve all fee categories with their related class, medium, and master category
        $categories = FeeCategory::with('class', 'medium', 'masterFeeCategory')
            ->get()
            ->groupBy(function ($item) {
                return $item->class_id;
            });

        $masterCategories = MasterFeeCategory::all(); // Get all master categories for selection
        $classes = Standard::all(); // Retrieve all classes
        $mediums = Medium::all(); // Retrieve all mediums
        return view('schooladmin.feemanagement.fee_categories.manage', compact('categories', 'masterCategories', 'classes', 'mediums'));
    }

    public function storeFeeCategory(Request $request)
    {
        // Validate the entire form data
        $validatedData = $request->validate([
            'master_category_id' => 'nullable|exists:master_fee_categories,id',
            'medium_id' => 'required|exists:mediums,id',
            'class_id' => 'required|exists:standards,id',
            'due_date' => 'required|date',
            'category_name' => 'required|array',
            'category_name.*' => 'required|string|max:255',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric|min:0',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string|max:1000',
        ]);

        DB::beginTransaction(); // Begin transaction for consistency

        try {
            Log::info('Starting the insertion of fee categories.');

            // Loop through the category data arrays and insert each fee category
            foreach ($validatedData['category_name'] as $index => $categoryName) {
                Log::info('Inserting Fee Category:', ['category_name' => $categoryName]);

                // Insert into fee_categories table
                $feeCategory = FeeCategory::create([
                    'master_category_id' => $validatedData['master_category_id'],
                    'medium_id' => $validatedData['medium_id'],
                    'class_id' => $validatedData['class_id'],
                    'category_name' => $categoryName,
                    'amount' => $validatedData['amount'][$index],
                    'description' => $validatedData['description'][$index] ?? null,
                ]);

                Log::info('Inserted Fee Category ID:', ['fee_category_id' => $feeCategory->id]);

                // Fetch students of the class and medium
                $students = Student::where('class_id', $validatedData['class_id'])
                    ->where('medium_id', $validatedData['medium_id'])
                    ->get();

                if ($students->isEmpty()) {
                    Log::warning('No students found for class_id ' . $validatedData['class_id'] . ' and medium_id ' . $validatedData['medium_id']);
                }

                // Insert into student_fees table for each student
                foreach ($students as $student) {
                    Log::info('Inserting Fee for Student ID:', ['student_id' => $student->id]);

                    StudentFee::create([
                        'student_id' => $student->id,
                        'master_category_id' => $validatedData['master_category_id'],
                        'class_id' => $validatedData['class_id'],
                        'medium_id' => $validatedData['medium_id'],
                        'semester_id' => $currentSemesterId, // Make sure this value is set correctly
                        'fee_category_id' => $feeCategory->id, // Link to fee_category
                        'total_amount' => $feeCategory->amount,
                        'paid_amount' => 0.00,
                        'status' => 'pending',
                        'payment_type' => 'full',
                        'is_custom' => false,
                    ]);
                }
            }

            DB::commit(); // Commit transaction after successful insertion
            Log::info('Fee Categories and Student Fees inserted successfully.');

            return redirect()->route('manageFeeCategories')
                ->with('success', 'Fee Categories Created Successfully');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction in case of error
            Log::error('Error inserting fee categories:', ['error' => $e->getMessage()]);

            return redirect()->back()->with('error', 'An error occurred while creating the fee categories.');
        }
    }


    public function getClassFees($classId)
    {
        $class = Standard::findOrFail($classId);
        $fees = FeeCategory::where('class_id', $classId)->get();
        $totalAmount = $fees->sum('amount');
        $dueDate = $fees->first()->due_date ?? 'N/A';

        return response()->json([
            'class_name' => $class->standard_name,
            'due_date' => $dueDate,
            'total_amount' => $totalAmount,
            'fees' => $fees
        ]);
    }

    public function getClassesByMedium($mediumId)
    {
        $classes = Standard::where('medium_id', $mediumId)->get();
        return response()->json($classes);
    }

    public function showStudents()
    {
        $mediums = Medium::all();
        $emsClasses = Standard::where('medium_id', 3)->get();
        $gmsClasses = Standard::where('medium_id', 4)->get();
        return view('schooladmin.feemanagement.fee_categories.Show_fees_ClassWise', compact('emsClasses', 'gmsClasses', 'mediums'));
    }

    public function fetchStudentsClassWise($class_id)
    {
        $students = Student::with('standard')
            ->leftJoin('payments', 'students.id', '=', 'payments.student_id')
            ->select(
                'students.id',
                'students.first_name',
                'students.last_name',
                'students.roll_number',
                'students.class_id',
                'payments.paid_amount',
                'payments.due_amount',
                'payments.total_fees'
            )
            ->where('students.class_id', $class_id)
            ->orderBy('students.roll_number', 'ASC')
            ->get();




        $totalFeesClassWise = FeeCategory::where('class_id', $class_id)->sum('amount');

        $classStandard = Standard::find($class_id);


        return response()->json([
            'status' => true,
            'students' => $students,
            'totalFeesClassWise' => $totalFeesClassWise,
            'classStandard' => $classStandard
        ]);
    }


    public function fetchMasterFeeCategories()
    {
        $categories = DB::table('master_fee_categories')->select('id', 'category_name')->get();

        return response()->json([
            'status' => true,
            'categories' => $categories,
        ]);
    }

    public function submitStudentFeesPayment(Request $request, $student_id)
    {



        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'fee_category_id' => 'required|exists:master_fee_categories,id',
            'class_id' => 'required',
            'medium_id' => 'required',
            'total_fees' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }


        $student = Student::findOrFail($student_id);
        $feeCategoryId = FeeCategory::where('master_category_id', $request->fee_category_id)->first();

        if (!$feeCategoryId) {
            return response()->json([
                'status' => false,
                'message' => 'Fee Category not found for the provided master category ID.',
            ], 404);
        }


        $totalCategoryAmount = FeeCategory::where('master_category_id', $request->fee_category_id)->sum('amount');
        $totalPaidAmount = Payment::where('fee_category_id', $request->fee_category_id)
            ->where('student_id', $student_id)
            ->sum('paid_amount');


        $remainingDueAmount = $totalCategoryAmount - $totalPaidAmount;
        // dd($remainingDueAmount);
        if ($request->paid_amount > $remainingDueAmount) {
            return response()->json([
                'status' => false,
                'message' => 'Paid amount exceeds the remaining due amount for the selected category. Remaining due amount: ' . $remainingDueAmount,
            ]);
        }

        $medium = Medium::where('medium_name', $request->input('medium_id'))->first();
        if (!$medium) {
            return response()->json([
                'status' => false,
                'message' => 'Medium not found'
            ]);
        }

        $standard = Standard::where('standard_name', $request->input('class_id'))
            ->where('medium_id', $medium->id)
            ->first();



        if (!$standard) {
            return response()->json([
                'status' => false,
                'message' => 'Standard not found for the given class and medium'
            ]);
        }


        $payment = Payment::where('student_id', $student_id)->orderBy('created_at', 'desc')->first();
        $totalFees = $request->total_fees;
        $paidAmount = $request->paid_amount;
        $currentDueAmount = $payment ? $payment->due_amount : $totalFees;
        $newDueAmount = $currentDueAmount - $paidAmount;


        Payment::create([
            'student_name' => $request->student_name,
            'student_id' => $student_id,
            'medium_id' => $medium->id,
            'class_id' => $standard->id,
            'total_fees' => $totalFees,
            'paid_amount' => $paidAmount,
            'due_amount' => $newDueAmount,
            'fee_category_id' => $feeCategoryId->master_category_id,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Fees Paid successfully'
        ]);
    }


    public function fees_payment_history(Request $request)
    {
        $fees_payment_histories = Payment::with('standard', 'medium', 'student')->latest()->get();


        $fees_payment_histories = Payment::orderBy('id', 'desc')->paginate(5);

        $fee_categories_name = MasterFeeCategory::all(['category_name']);


        $sumByMasterCategory = DB::table('fee_categories')
            ->join('master_fee_categories', 'fee_categories.master_category_id', '=', 'master_fee_categories.id')
            ->select('master_fee_categories.category_name', 'fee_categories.master_category_id', DB::raw('SUM(fee_categories.amount) as total_amount'))
            ->groupBy('fee_categories.master_category_id', 'master_fee_categories.category_name')
            ->get();


            $fee_categories = DB::table('fee_categories')
            ->join('master_fee_categories', 'fee_categories.master_category_id', '=', 'master_fee_categories.id')
            ->select(
                'master_fee_categories.category_name',
                'fee_categories.master_category_id',
                DB::raw('SUM(fee_categories.amount) as total_amount'),
                DB::raw('COUNT(fee_categories.id) as category_count')
            )
            ->groupBy('fee_categories.master_category_id', 'master_fee_categories.category_name')
            ->get();




        $totalFees = FeeCategory::sum('amount');



        $totalFeesPaid = Payment::sum('paid_amount');
        $categories = MasterFeeCategory::all();

        $totalPaidAmountByCategory = 0;


        foreach ($categories as $category) {
            $paidAmount = Payment::where('fee_category_id', $category->id)->sum('paid_amount');
            $totalPaidAmountByCategory += $paidAmount;
        }



        $schoolFeeCategory = MasterFeeCategory::where('category_name', 'School Fee')->first();

        if ($schoolFeeCategory) {
            $schoolFeesPaid = Payment::where('fee_category_id', $schoolFeeCategory->id)->sum('paid_amount');
        } else {
            dd("Category 'School Fee' not found.");
        }


        $MandalFeeCategory = MasterFeeCategory::where('category_name', 'Mandal Fee')->first();

        $mandalFeesPaid = 0;

        if ($MandalFeeCategory) {

            $mandalFeesPaid = Payment::where('fee_category_id', $MandalFeeCategory->id)->sum('paid_amount');
        }

        // $totalDueAmount = Payment::orderBy('id', 'desc')->first();

        $schoolFeeCategory = MasterFeeCategory::where('category_name', 'School Fee')->first();

        if ($schoolFeeCategory) {

            $totalSchoolFee = FeeCategory::where('master_category_id', $schoolFeeCategory->id)->sum('amount');

            $schoolFeesPaid = Payment::where('fee_category_id', $schoolFeeCategory->id)->sum('paid_amount');

            $schoolFeeDue = $totalSchoolFee - $schoolFeesPaid;
        } else {
            dd("Category 'School Fee' not found.");
        }




        $mandalFeeCategory = MasterFeeCategory::where('category_name', 'Mandal Fee')->first();


        if ($mandalFeeCategory) {
            $totalMandalFee = FeeCategory::where('master_category_id', $mandalFeeCategory->id)->sum('amount');
            $mandalFeesPaid = Payment::where('fee_category_id', $mandalFeeCategory->id)->sum('paid_amount');
            $mandalFeeDue = $totalMandalFee - $mandalFeesPaid;
        } else {
            $totalMandalFee = 0;
            $mandalFeeDue = 0;
            $mandalFeesPaid = 0;
        }

        $totalDueAmount = $schoolFeeDue + $mandalFeeDue;


        return view('schooladmin/feemanagement/fee_categories/payment_history', compact(
            'fees_payment_histories',
            'totalFees',
            'fee_categories_name',
            'sumByMasterCategory',
            'totalFeesPaid',
            'totalPaidAmountByCategory',
            'mandalFeesPaid',
            'schoolFeesPaid',
            'totalDueAmount',
            'mandalFeeDue',
            'schoolFeeDue',
            'fee_categories'
        ));
    }



    public function getMasterFeeCategories($student_id, $class_id)
    {
        // Fetch categories from the master_fee_categories table
        $categories = MasterFeeCategory::all(['category_name']);

        if ($categories->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No Fees Categories Records found.',
            ]);
        }

        return response()->json([
            'status' => true,
            'categories' => $categories,
        ]);
    }


    public function showFeeDetails($studentId)
    {
        $studentPayments = Payment::where('student_id', $studentId)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('schooladmin/feemanagement/fee_categories/fee_details', compact('studentPayments'));
    }
}
