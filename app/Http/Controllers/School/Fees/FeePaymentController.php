<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeePayment;
use App\Models\Student;
use App\Models\FeeAssignment;
use Illuminate\Support\Str;
use App\Models\Medium;
use App\Models\Standard;
use App\Models\ClassModel;
use App\Models\FeeGroup;
use App\Models\FeesMaster;
use Illuminate\Support\Facades\Log;


class FeePaymentController extends Controller
{
    public function index(Request $request)
    {
        $mediums = Medium::all();
        $standards = Standard::all();
        $sections = ClassModel::all();
        $feeGroups = FeeGroup::all();
        $feesMasters = FeesMaster::all();

        $feePayments = FeePayment::with('student', 'feeAssignment.feesMaster.feeType');

        if ($request->filled('medium_id')) {
            $feePayments = $feePayments->whereHas('student', function($query) use ($request) {
                $query->where('medium_id', $request->medium_id);
            });
        }

        if ($request->filled('standard_id')) {
            $feePayments = $feePayments->whereHas('student', function($query) use ($request) {
                $query->where('standard_id', $request->standard_id);
            });
        }

        if ($request->filled('section_id')) {
            $feePayments = $feePayments->whereHas('student', function($query) use ($request) {
                $query->where('class_id', $request->section_id);
            });
        }

        if ($request->filled('fee_group_id')) {
            $feePayments = $feePayments->whereHas('feeAssignment', function($query) use ($request) {
                $query->where('fee_group_id', $request->fee_group_id);
            });
        }

        if ($request->filled('fees_master_id')) {
            $feePayments = $feePayments->where('fee_assignment_id', $request->fees_master_id);
        }

        $feePayments = $feePayments->get();

        return view('schooladmin.feecollection.feepayment.index', compact('feePayments', 'mediums', 'standards', 'sections', 'feeGroups', 'feesMasters'));
    }

    public function dueFees(Request $request)
    {
        $mediums = Medium::all();
        $standards = Standard::all();
        $classes = ClassModel::all();
        $feeGroups = FeeGroup::all();

        $students = Student::with('feePayments')
            ->where(function ($query) use ($request) {
                if ($request->medium_id) {
                    $query->where('medium_id', $request->medium_id);
                }
                if ($request->standard_id) {
                    $query->where('standard_id', $request->standard_id);
                }
                if ($request->class_id) {
                    $query->where('class_id', $request->class_id);
                }
            })
            ->whereDoesntHave('feePayments', function ($query) {
                $query->where('status', 'paid');
            })
            ->get();

        return view('schooladmin.feecollection.feepayment.due', compact('students', 'mediums', 'standards', 'classes', 'feeGroups'));
 }





    public function create()
    {
        $students = Student::all();
        $feeAssignments = FeeAssignment::all();
        return view('schooladmin.feecollection.feepayment.create', compact('students', 'feeAssignments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_assignment_id' => 'required|exists:fee_assignments,id',
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_type' => 'required|string',
            'payment_mode' => 'required|string',
            'transaction_id' => 'nullable|string',
            'bank_payment_id' => 'nullable|string',
            'check_number' => 'nullable|string',
        ]);

        $feePayment = FeePayment::create([
            'student_id' => $request->student_id,
            'fee_assignment_id' => $request->fee_assignment_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'status' => 'paid',
            'payment_type' => $request->payment_type,
            'payment_mode' => $request->payment_mode,
            'transaction_id' => $request->transaction_id,
            'bank_payment_id' => $request->bank_payment_id,
            'check_number' => $request->check_number,
            'unique_payment_id' => Str::uuid(),
        ]);

        return redirect()->route('schooladmin.feecollection.feepayment.index')->with('success', 'Fee Payment recorded successfully.');
    }

    public function edit(FeePayment $feepayment)
    {
        $students = Student::all();
        $feeAssignments = FeeAssignment::all();
        return view('schooladmin.feecollection.feepayment.edit', compact('feepayment', 'students', 'feeAssignments'));
    }

    public function update(Request $request, FeePayment $feepayment)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_assignment_id' => 'required|exists:fee_assignments,id',
            'amount_paid' => 'required|numeric',
            'payment_date' => 'required|date',
            'payment_type' => 'required|string',
            'payment_mode' => 'required|string',
            'transaction_id' => 'nullable|string',
            'bank_payment_id' => 'nullable|string',
            'check_number' => 'nullable|string',
        ]);

        $feepayment->update([
            'student_id' => $request->student_id,
            'fee_assignment_id' => $request->fee_assignment_id,
            'amount_paid' => $request->amount_paid,
            'payment_date' => $request->payment_date,
            'status' => 'paid',
            'payment_type' => $request->payment_type,
            'payment_mode' => $request->payment_mode,
            'transaction_id' => $request->transaction_id,
            'bank_payment_id' => $request->bank_payment_id,
            'check_number' => $request->check_number,
        ]);

        return redirect()->route('schooladmin.feecollection.feepayment.index')->with('success', 'Fee Payment updated successfully.');
    }

    public function destroy(FeePayment $feepayment)
    {
        $feepayment->delete();
        return redirect()->route('schooladmin.feecollection.feepayment.index')->with('success', 'Fee Payment deleted successfully.');
    }

    public function collectFees(Student $student)
    {
        $feePayments = FeePayment::with('feeAssignment.feesMaster.feeType')
                        ->where('student_id', $student->id)
                        ->get();

        return view('schooladmin.feecollection.feepayment.collect', compact('student', 'feePayments'));
    }
}
