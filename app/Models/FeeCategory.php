<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_category_id',
        'class_id',
        'medium_id',
        'category_name',
        'description',
        'amount',
    ];

    public function masterFeeCategory()
    {
        return $this->belongsTo(MasterFeeCategory::class, 'master_category_id', 'id');
    }
    public function masterCategory()
    {
        return $this->belongsTo(MasterFeeCategory::class, 'master_category_id', 'id');
    }


    public function class()
    {
        return $this->belongsTo(Standard::class, 'class_id'); // Assuming ClassModel is your class table
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class, 'medium_id');
    }

    protected $casts = [
        'subcategories' => 'array',
    ];
}
