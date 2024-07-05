<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
        'standard_name',
        'medium_id',
        'status',
    ];

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class);
    }
}
