<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandardsWiseLiveTelecast extends Model
{
    use HasFactory;

    protected $table = 'standards_wise_live_telecast';

    protected $fillable = [
        'medium_id',
        'standard_id',
        'start_date',
        'end_date',
        'live_telecast_url',
        'status',
    ];


    public function medium()
    {
        return $this->belongsTo(Medium::class, 'medium_id');
    }

    public function standard()
    {
        return $this->belongsTo(Standard::class, 'class_id');
    }
    protected $casts = [
        'start_date' => 'datetime',
      ];
}
