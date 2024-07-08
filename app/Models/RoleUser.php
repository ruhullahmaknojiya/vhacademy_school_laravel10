<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'role_user';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'role_id',
        'created_at',
        'updated_at'
    ];

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to the Role model
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
