<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullName',
        'photo',
        'studentRollId',
        'admission_number',
        'admission_date',
        'birthday',
        'gender',
        'address',
        'Parents_phoneNo',
        'student_mobileNo',
        'studentAcademicYear',
        'religion',
        'caste',
        'uid',
        'adharcard',
        'email_id',
        'lc_document',
        'adharcard_document',
        'lc_number',
        'school_id',
        'medium_id',
        'standard_id',
        'class_id',
        'firebase_token',
    ];

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

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }

    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }
}
