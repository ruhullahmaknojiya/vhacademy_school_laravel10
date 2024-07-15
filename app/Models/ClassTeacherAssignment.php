<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTeacherAssignment extends Model
{
    use HasFactory;
    protected $table = 'classes_teacher_assignments';
    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class); // Assuming your class model is named SchoolClass
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
