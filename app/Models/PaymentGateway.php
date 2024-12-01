<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;

    protected $fillable = [
        'gateway_name',
        'credentials',
        'status',
    ];

    public function masterFeeCategories()
    {
        return $this->hasMany(MasterFeeCategory::class, 'payment_gateway_id');
    }
}
