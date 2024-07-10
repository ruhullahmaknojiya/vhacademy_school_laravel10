<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'medium_id',
        'standard_id',
        'class_id',
        'subject_id',
        'student_id',
        'school_id',
        'date',
        'attendance_status',
        'submission_date',
        'submission_status',
    ];
}
