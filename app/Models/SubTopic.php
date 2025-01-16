<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    use HasFactory;

    public $table = 'sub_topics';

    public $fillable = [
        'sub_topic',
        'type',
        'video',
        'stopic_image',
        'vhm_start_title',
        'vhm_end_title',
        'vhm_start_url',
        'vhm_end_url',
        'description',
        'file_path',
        'video_link',
        'topic_id',
        'subject_id'
    ];


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function medium()
    {
        return $this->belongsTo(Medium::class);
    }

    public function standards()
    {
        return $this->belongsTo(Standard::class);
    }


    public function subjects()
    {
        return $this->belongsTo(Subject::class);
    }


}
