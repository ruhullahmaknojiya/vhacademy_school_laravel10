<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'fee_group_id',
        'fee_type_id',
        'due_date',
        'amount',
        'fine_type',
        'percentage',
        'fix_amount'
    ];

    public function feeGroup()
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function feeType()
    {
        return $this->belongsTo(FeeType::class);
    }
}
