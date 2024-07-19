<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'school_id',
        'attendance_date',
        'status',
        'holiday_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function holiday()
    {
        return $this->belongsTo(Holiday::class);
    }
}
