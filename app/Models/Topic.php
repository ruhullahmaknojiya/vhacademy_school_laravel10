<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;


    public $table='topics';
        public $fillable=['topic','topic_image','type','description','file_path','video_link','sub_id','topic_banner'];

    public function subject(){

        return $this->belongsTo(Subject::class,'sub_id');
    }
    public function subtopic(){

        return $this->hasMany(SubTopic::class,'topic_id');
    }
}
