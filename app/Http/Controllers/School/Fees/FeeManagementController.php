<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use App\Models\MasterFeeCategory;
use App\Models\FeeCategory;
use App\Models\Standard;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Medium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class FeeManagementController extends Controller
{
    // Manage Master Fee Categories - Create and List in the Same View
    public function manageMasterFeeCategories()
    {
        $categories = MasterFeeCategory::with('feeCategories')->get();
        return view('schooladmin.feemanagement.master_fee_categories.manage', compact('categories'));
    }

    // Store a new Master Fee Category
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
    // Fetch all EMS and GMS classes separately based on their medium
    $emsClasses = Standard::where('medium_id', 3)->get(); // Assuming '1' is for EMS medium
    $gmsClasses = Standard::where('medium_id', 4)->get(); // Assuming '2' is for GMS medium

    // Pass the data to the view
    return view('schooladmin.feemanagement.fee_categories.index', compact('emsClasses', 'gmsClasses'));
}

    public function manageFeeCategories()
    {
        // Retrieve all fee categories with their related class, medium, and master category
        $categories = FeeCategory::with('class', 'medium', 'masterFeeCategory')
            ->get()
            ->groupBy(function ($item) {
                return $item->class_id; // Group by class and medium
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
}
