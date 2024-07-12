<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    public $table='holidays';
    public $fillable=['school_id','holiday_name','holiday_image','start_date','end_date','description'];
}

