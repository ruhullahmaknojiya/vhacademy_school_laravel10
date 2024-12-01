<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAuditTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_fee_id',
        'action',
    ];

    public function studentFee()
    {
        return $this->belongsTo(StudentFee::class, 'student_fee_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
