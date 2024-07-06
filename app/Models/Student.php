<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'uid',
        'admission_no',
        'roll_number',
        'first_name',
        'last_name',
        'class_id',
        'section_id',
        'medium_id',
        'school_id',
        'gender',
        'date_of_birth',
        'category',
        'religion',
        'caste',
        'mobile_number',
        'email',
        'admission_date',
        'blood_group',
        'house',
        'height',
        'weight',
        'medical_history',
        'student_photo',
        'aadharcard_number',
        'current_address',
        'permanent_address'
    ];

    public function parents()
    {
        return $this->hasMany(Parent::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class); // Added school relationship
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

    // public function parent()
    // {
    //     return $this->belongsTo(ParentModel::class);
    // }

    public function parent()
    {
        return $this->hasOne(ParentModel::class);
    }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
