<?php

namespace App\Http\Controllers\School\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Payment;
use App\Models\MasterFeeCategory;

class InvoiceController extends Controller
{

    public function generateInvoicePDF($studentId, $standard_id, $categoryName)
    {
        $category = MasterFeeCategory::where('category_name', $categoryName)->first();



        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid fee category selected.',
            ]);
        }


        $payment = Payment::where('student_id', $studentId)
            ->where('fee_category_id', $category->id)
            ->where('class_id', $standard_id)
            ->first();



        if (!$payment) {
            return response()->json([
                'status' => false,
                'message' => 'No payment found for the selected category.',
            ]);
        }



        $data = [
            'student_id' => $studentId,
            'student_name' => $payment->student_name,
            'class_name' => $payment->standard->standard_name,
            'category_name' => $category->category_name,
            'total_fees' => $payment->total_fees,
            'paid_amount' => $payment->paid_amount,
            'due_amount' => $payment->due_amount,
            'date' => now()->format('Y-m-d'),
        ];





        $pdf = PDF::loadView('pdf.invoice', $data);

        return $pdf->download('StudentFees-' . $payment->student_name . '.pdf');


        return response()->json([
            'status' => true,
            'message' => 'pdf Downloaded'
        ]);
    }

    public function generateInvoiceAll()
    {
        $fees_payment_histories = Payment::with('feeCategory','medium','standard')
            // ->where('paid_amount', '>', 0)
            ->get();
        if ($fees_payment_histories->isEmpty()) {
            return redirect()->back()->with('error', 'No fee records available to generate invoice.');
        }

        $pdf = Pdf::loadView('pdf.invoice-all', ['fees_payment_histories' => $fees_payment_histories]);

        return $pdf->download('all_students_fees_invoice.pdf');
    }

    public function generateInvoicePdfSingleRecords($id)
    {
        $fees_payment_history = Payment::with('feeCategory','medium')->find($id);

        if (!$fees_payment_history) {
            return redirect()->back()->with('error', 'Fee payment record not found.');
        }

        $pdf = Pdf::loadView('pdf.invoice.fees.fee-invoice', ['fees_payment_history' => $fees_payment_history]);

        return $pdf->download('fee_invoice_' . $fees_payment_history->id . '.pdf');
    }
}
