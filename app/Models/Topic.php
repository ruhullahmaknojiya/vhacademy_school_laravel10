<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;


    public $table = 'topics';
    public $fillable = [ 'medium_id','standard_id','topic', 'topic_image', 'type', 'description', 'file_path', 'video_link', 'sub_id', 'topic_banner'];


    // public function subtopic(){

    //     return $this->hasMany(SubTopic::class,'topic_id');
    // }
    public function subtopics()
    {
        return $this->hasMany(Topic::class, 'topic_id');
    }

    // Define the subject relationship if it's not already defined
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'sub_id');
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class, 'medium_id');
    }

    public function standards()
    {
        return $this->belongsTo(Standard::class, 'standard_id');
    }



    // public function subtopics()
    // {
    //     return $this->hasMany(Subtopic::class, 'parent_topic_id');
    // }

    // public function subtopics()
    // {
    //     return $this->hasMany(SubTopic::class);
    // }


}
