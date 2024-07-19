<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class SchoolProviderConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'provider_id',
        'configuration',
        'is_active',
    ];

    protected $casts = [
        'configuration' => 'array',
    ];

    public function setConfigurationAttribute($value)
    {
        $this->attributes['configuration'] = Crypt::encryptString(json_encode($value));
    }

    public function getConfigurationAttribute($value)
    {
        return json_decode(Crypt::decryptString($value), true);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
