<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'master_category_id',
        'semester_id',
        'total_amount',
        'paid_amount',
        'late_fee',
        'discount_amount',
        'status',
        'payment_type',
        'is_custom',
    ];

    public function masterFeeCategory()
    {
        return $this->belongsTo(MasterFeeCategory::class, 'master_category_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }

    public function customStudentFees()
    {
        return $this->hasMany(CustomStudentFee::class, 'student_fee_id');
    }

    public function emiPayments()
    {
        return $this->hasMany(EmiPayment::class, 'student_fee_id');
    }

    public function lateFees()
    {
        return $this->hasMany(LateFee::class, 'student_fee_id');
    }

    public function feeDiscounts()
    {
        return $this->hasMany(FeeDiscount::class, 'student_fee_id');
    }

    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, 'student_fee_id');
    }

    public function paymentNotifications()
    {
        return $this->hasMany(PaymentNotification::class, 'student_fee_id');
    }
}
