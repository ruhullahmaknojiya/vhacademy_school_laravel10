<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePayment extends Model
{
    use HasFactory;

    protected $table = 'fee_payments';

    protected $fillable = [
        'student_id',
        'fee_assignment_id',
        'amount_paid',
        'payment_date',
        'status',
        'payment_type',
        'payment_mode',
        'transaction_id',
        'bank_payment_id',
        'check_number',
        'unique_payment_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function feeAssignment()
    {
        return $this->belongsTo(FeeAssignment::class);
    }
}
