<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAssignment extends Model
{
    use HasFactory;
    protected $table = 'fee_assignments';

    protected $fillable = [
        'fee_group_id',
        'fees_master_id',
        'medium_id',
        'standard_id',
        'section_id'
    ];

    public function feeGroup()
    {
        return $this->belongsTo(FeeGroup::class);
    }

    public function feesMaster()
    {
        return $this->belongsTo(FeesMaster::class);
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function section()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
