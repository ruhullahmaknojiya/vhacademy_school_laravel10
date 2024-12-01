<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{

    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_SCHOOLADMIN = 'schooladmin';

    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;



    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id', // Add this line
        'fcm_token'
    ];
    // protected $hidden = ['password', 'remember_token'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function hasRole($role)
    {
        return $this->role->name === $role;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    
    public function roleView()
    {
     return $this->belongsToMany(Role::class);
     }

    public function role()
    {
    return $this->belongsTo(Role::class);
     }

     public function userable()
     {
        return $this->morphTo();
     }

    // public function hasRole($role)
    // {
    //     return $this->roles()->where('name', $role)->exists();
    // }
    public function student()
    {
        return $this->hasOne(Student::class,'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function parent()
    {
        return $this->belongsTo(ParentModel::class);
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }
    

   

    public function notificationViews()
    {
        return $this->hasMany(NotificationView::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
