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

    public function standard()
    {
        return $this->hasMany(Standard::class);
    }
    
    public function classTeacherAssignments()
    {
        return $this->hasMany(ClassTeacherAssignment::class);
    }
    
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_subject_assigns');
    }
}
