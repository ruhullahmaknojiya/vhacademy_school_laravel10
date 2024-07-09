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
        'teacher_id', 'medium_id', 'standard_id', 'class_id', 'subject_id', 'date', 'topic_title', 'topic_description', 'school_id', 'pdf_path',
    ];
    public function teacher(){

        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function medium(){

        return $this->belongsTo(Medium::class,'medium_id');
    }

    public function stander(){

        return $this->belongsTo(Stander::class,'standard_id');
    }

    public function classs(){

        return $this->belongsTo(Classs::class,'class_id');
    }


    public function subject(){

        return $this->belongsTo(Subject::class,'subject_id');
    }
}
