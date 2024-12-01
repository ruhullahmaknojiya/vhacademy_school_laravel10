<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Day;
// use App\Models\TeacherTimetable;
use App\Models\Standard;
use App\Models\Subject;
use App\Models\Medium;
use App\Models\Classs;
use App\Models\Teacher;
class TeacherTimetable extends Model
{
    public $fillable=['teacher_id','medium_id','standard_id','class_id','day','subject_id','date','start_time','end_time','school_id'];

    use HasFactory;
    public function teacher(){

        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function medium(){

        return $this->belongsTo(Medium::class,'medium_id');
    }

    // Define the relationship with the Standard model
    public function standard()
    {
        return $this->belongsTo(Standard::class, 'standard_id');
    }

    public function classmodel(){

        return $this->belongsTo(ClassModel::class,'class_id');
    }

//    public function day(){
//
//        return $this->belongsTo(Day::class,'day_id');
//    }
    public function subject(){

        return $this->belongsTo(Subject::class,'subject_id');
    }
    
  

public function timetables()
{
    return $this->hasMany(TeacherTimetable::class, 'teacher_id', 'teacher_id');
}
    
}
