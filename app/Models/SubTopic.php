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
        'stopic_image',
        'vhm_start_title',
        'vhm_end_title',
        'vhm_start_url',
        'vhm_end_url',
        'description',
        'file_path',
        'video_link',
        'topic_id',
    ];


    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
