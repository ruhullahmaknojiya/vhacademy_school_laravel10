<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    use HasFactory;
    protected $table = 'parents';
    protected $fillable = [
        'user_id',
        'father_name',
        'father_phone',
        'father_occupation',
        'father_photo',
        'mother_name',
        'mother_phone',
        'mother_occupation',
        'mother_photo',
        'guardian_name',
        'guardian_relation',
        'guardian_phone',
        'guardian_email',
        'guardian_occupation',
        'guardian_address',
        'guardian_photo'
    ];

    // public function student()
    // {
    //     return $this->belongsTo(Student::class);
    // }

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
