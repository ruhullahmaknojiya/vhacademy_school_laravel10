<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'student_name',
        'class_id',
        'medium_id',
        'student_id',
        'total_fees',
        'fee_category_id',
        'paid_amount',
        'due_amount',
    ];

    public function feeCategory()
    {
        return $this->belongsTo(MasterFeeCategory::class, 'fee_category_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class, 'class_id', 'id');
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id'); // Replace ClassModel with the actual class model name
    }
}
