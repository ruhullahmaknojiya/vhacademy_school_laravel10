<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationView extends Model
{
    use HasFactory;

    protected $casts = [
        'viewed_at' => 'datetime',
    ];
    
    protected $fillable = [
        'notice_id',
        'user_id',
        'viewed_at',
    ];

    /**
     * Get the notice that this view belongs to.
     */
    
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notice()
    {
        return $this->belongsTo(Notice::class);
    }
}
