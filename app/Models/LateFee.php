<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LateFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fee_id',
        'penalty_amount',
        'status',
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class, 'student_fee_id');
    }
}
