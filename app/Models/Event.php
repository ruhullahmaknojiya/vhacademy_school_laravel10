<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $table='events';
    public $fillable=['event_title','event_image','repeated','event_video','event_pdf','start_date','end_date','short_Description','school_id','color'];
}
