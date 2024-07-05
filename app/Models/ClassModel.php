<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $fillable = [
        'class_name',
        'status',
    ];


    // public function standard()
    // {
    //     return $this->belongsTo(Standard::class);
    // }
}
