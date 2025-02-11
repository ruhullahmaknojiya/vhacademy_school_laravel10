<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTopic extends Model
{
    use HasFactory;

    public $table = 'sub_topics';

    protected $fillable = [
        'type',
        'video',
        'medium_id',
        'standard_id',
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



    public function mediums()
    {
        return $this->belongsTo(Medium::class, 'medium_id', 'id');
    }

    public function standards()
    {
        return $this->belongsTo(Standard::class, 'standard_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }
}
