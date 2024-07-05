<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'parentProfession',
        'parentOf',
        'Father_photo',
        'father_full_name',
        'father_email',
        'father_personal_number',
        'father_dob',
        'mother_full_name',
        'mother_dob',
        'mother_profession',
        'mother_job_or_housewise',
        'mother_job_name',
        'mother_mobile_number',
        'password',
        'firebase_token',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
