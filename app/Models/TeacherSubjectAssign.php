<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSubjectAssign extends Model
{
    use HasFactory;
    protected $table = 'teacher_subject_assigns';
    protected $fillable = ['teacher_id', 'subject_id', 'school_id', 'medium_id', 'standard_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class);
    }
}
