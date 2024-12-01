<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fee_id',
        'amount_due',
        'amount_paid',
        'status',
        'due_date',
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class, 'student_fee_id');
    }
}
