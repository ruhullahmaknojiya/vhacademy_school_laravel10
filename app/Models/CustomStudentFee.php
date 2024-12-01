<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomStudentFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fee_id',
        'fee_category_id',
        'custom_amount',
        'reason',
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class, 'student_fee_id');
    }

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id');
    }
}
