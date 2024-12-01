<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_fee_id',
        'discount_amount',
        'reason',
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class, 'student_fee_id');
    }
}
