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
            'roll_number' => 'required',
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
        $roll_number = $request->roll_number;
        $paidAmount = $request->paid_amount;
        $currentDueAmount = $payment ? $payment->due_amount : $totalFees;
        $newDueAmount = $currentDueAmount - $paidAmount;


        Payment::create([
            'student_name' => $request->student_name,
            'student_id' => $student_id,
            'medium_id' => $medium->id,
            'roll_number' => $roll_number,
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
            ->with('feeCategory') // Eager load the fee category
            ->get();

        $dueAmountsFee = Payment::where('student_id', $studentId)
            ->first();



        $student_fees_payment_histories = Payment::where('student_id', $studentId)->get();
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

        $feesCategoryStudentWise = Payment::with('feeCategory')
            ->where('student_id', $studentId)
            ->groupBy('fee_category_id')
            ->selectRaw('fee_category_id, SUM(paid_amount) as total_paid')
            ->pluck('total_paid', 'fee_category_id');

        $categoryFeeDueDetails = [];
        foreach ($fee_categories as $category) {
            $totalAmount = $category->total_amount;
            $paidAmount = $feesCategoryStudentWise[$category->master_category_id] ?? 0;
            $dueAmount = $totalAmount - $paidAmount;

            $categoryFeeDueDetails[] = [
                'category_name' => $category->category_name,
                'total_amount' => $totalAmount,
                'paid_amount' => $paidAmount,
                'due_amount' => $dueAmount,
                'categoryFeeDueDetails' => $categoryFeeDueDetails,
            ];
        }

        $fees_payment_histories = Payment::latest()->get();

        $due_fees_payments = Payment::where('student_id', $studentId)->first();

        // If no payments are found for the student, redirect to the fee payment history page
        if ($studentPayments->isEmpty()) {
            return redirect()->route('showStudentsByClassWise')->with('danger', 'Fees Payment Records Not Found for this student.');
        }

        // Get the sum of paid amounts for the student
        $sumPaidAmount = $studentPayments->sum('paid_amount');
        // $sumPaidAmount = $studentPayments->where('feeCategory.master_category_id', $schoolFeeCategory->id)->sum('paid_amount');

        // Calculate the total fees and due amount for the student
        $totalFees = FeeCategory::sum('amount');

        $paidAmount = Payment::sum('paid_amount');
        $dueAmount = $totalFees - $paidAmount;



        // Get all categories from MasterFeeCategory
        $feeCategories = MasterFeeCategory::all(['id', 'category_name']);
        $categoryWiseFees = Payment::selectRaw('fee_category_id, SUM(paid_amount) as total_paid')
            ->groupBy('fee_category_id')
            ->pluck('total_paid', 'fee_category_id');





        $categoryFeeDetails = [];


        foreach ($feeCategories as $category) {
            // Get subcategories for each category
            $subCategories = FeeCategory::where('master_category_id', $category->id)->get();



            // Calculate the total fee amount for each subcategory
            $subCategoryDetails = [];
            foreach ($subCategories as $subCategory) {

                $subCategoryTotalAmount = FeeCategory::where('master_category_id', $category->id)
                    ->where('category_name', $subCategory->category_name)
                    ->sum('amount');

                // Store subcategory name and total fee
                $subCategoryDetails[] = [
                    'subcategory_name' => $subCategory->category_name,
                    'total_amount' => $subCategoryTotalAmount
                ];
            }

            // Store category name, total fee, and subcategories with their amounts
            $categoryFeeDetails[] = [
                'id' => $category->id,
                'category_name' => $category->category_name,
                'total_fee' => $subCategories->sum('amount'),
                'subcategories' => $subCategoryDetails
            ];
        }

        // Pass all data to the view
        return view('schooladmin/feemanagement/fee_categories/fee_details', [
            'studentPayments' => $studentPayments,
            'sumPaidAmount' => $sumPaidAmount,
            'totalFees' => $totalFees,
            'dueAmount' => $dueAmount,
            'dueAmountsFee' => $dueAmountsFee,
            'student_fees_payment_histories' => $student_fees_payment_histories,
            'fees_payment_histories' => $fees_payment_histories,
            'categoryFeeDetails' => $categoryFeeDetails,
            'due_fees_payments' => $due_fees_payments,
            'fee_categories' => $fee_categories,
            'categoryWiseFees' => $categoryWiseFees,
            'feesCategoryStudentWise' => $feesCategoryStudentWise,
            'categoryFeeDueDetails' => $categoryFeeDueDetails

        ]);
    }



    public function showSubcategoryDetails($categoryId)
    {
        // Fetch category details
        $category = MasterFeeCategory::find($categoryId);

        // If category exists, fetch related subcategories
        if ($category) {
            $subCategories = FeeCategory::where('master_category_id', $category->id)->get();

            return view('schooladmin/feemanagement/fee_categories/feeCategory-SubCategory', [
                'category' => $category,
                'subCategories' => $subCategories,
            ]);
        }

        return redirect()->route('fees-payment-history')->with('error', 'Category not found');
    }


    public function viewPayment($studentId)
    {
        $payment = Payment::with(['standard', 'medium', 'feeCategory'])->where('student_id', $studentId)->first();

        $totalFees = FeeCategory::sum('amount');

        $paidAmount = Payment::where('student_id',$studentId)->sum('paid_amount');

        $dueAmount = $totalFees - $paidAmount;



        // Return the view and pass the payment data
        return view('schooladmin/feemanagement/fee_categories/View_fees_payment', compact('payment','totalFees','paidAmount','dueAmount'));
    }
}
