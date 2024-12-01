<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherLeave extends Model
{
    protected $fillable = ['teacher_id', 'school_id', 'leave_type', 'start_date', 'end_date', 'reason', 'status'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
