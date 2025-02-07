<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    protected $table = 'standards';
    protected $fillable = [
        'standard_name',
        'medium_id',
        'status',
    ];

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classes_teacher_assignments', 'standard_id', 'teacher_id');
    }


    public function classes()
    {
        return $this->hasMany(SchoolClass::class); // Assuming your class model is named SchoolClass
    }

    public function classTeacherAssignments()
    {
        return $this->hasMany(ClassTeacherAssignment::class,'standard_id');
    }

     public function teacherSubjectAssigns()
    {
        return $this->hasMany(TeacherSubjectAssign::class, 'standard_id');
    }

    public function topics()
    {
        return $this->hasMany(Topic::class, 'standard_id');
    }
}
