<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterFeeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'description',
        'payment_type',
        'installments',
        'installment_amount',
    ];

    public function feeCategories()
    {
        return $this->hasMany(FeeCategory::class, 'master_category_id');
    }
}
