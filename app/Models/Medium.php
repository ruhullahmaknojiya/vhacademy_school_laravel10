<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;
    protected $table = 'mediums';
    protected $fillable = [
        'medium_name',
        'status',
    ];

    public function standards()
    {
        return $this->hasMany(Standard::class);
    }



    public function classTeacherAssignments()
    {
        return $this->hasMany(ClassTeacherAssignment::class);
    }
}
