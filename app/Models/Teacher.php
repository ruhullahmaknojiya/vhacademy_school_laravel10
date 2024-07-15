<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'staff_id',
        'school_id',
        'designation',
        'department',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'email',
        'gender',
        'date_of_birth',
        'date_of_joining',
        'phone',
        'emergency_contact_number',
        'marital_status',
        'photo',
        'current_address',
        'permanent_address',
        'qualification',
        'work_experience',
        'note',
        'pan_number',
        'epf_no',
        'contract_type',
        'basic_salary',
        'work_shift',
        'work_location',
        'date_of_leaving',
        'account_title',
        'bank_account_number',
        'bank_name',
        'ifsc_code',
        'bank_branch_name',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
    ];

    protected $casts = [
        'qualification' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function classTeacherAssignments()
    {
        return $this->hasMany(ClassTeacherAssignment::class);
    }
}
