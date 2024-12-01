<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'medium_id',
        'semester_id',
        'fee_category_id',
    ];

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id');
    }
}
