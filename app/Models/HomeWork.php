<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stander;
use App\Models\Subject;
use App\Models\Medium;
use App\Models\Classs;
class HomeWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'medium_id',
        'standard_id',
        'class_id',
        'subject_id',
        'school_id',
        'date',
        'submition_date',
        'submition_status',
        'pdf_file',
        'topic_title',
        'topic_description',
        'status',
    ];


    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function medium() {
        return $this->belongsTo(Medium::class);
    }

    public function standard() {
        return $this->belongsTo(Standard::class);
    }

    public function class() {
        return $this->belongsTo(ClassModel::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function school() {
        return $this->belongsTo(School::class);
    }

}
