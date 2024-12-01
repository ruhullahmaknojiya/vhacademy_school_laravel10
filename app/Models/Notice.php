<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;


    protected $casts = [
        'date' => 'datetime',
        'roles' => 'array', // Cast the roles JSON column to an array

    ];

    protected $fillable = [
        'title',
        'content',
        'date',
        'roles',
    ];

    /**
     * Get the users who have viewed this notice.
     */
    public function views()
    {
        return $this->hasMany(NotificationView::class);
    }

    /**
     * Get the roles associated with this notice.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
