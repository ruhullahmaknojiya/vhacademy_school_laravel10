<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $table='subjects';
                public $fillable=['subject','subject_code','description','sub_image','std_id','subject_banner'];

                public function standard()
                {
                    return $this->belongsTo(Standard::class, 'std_id');
                }

                public function medium()
                {
                    return $this->standard->medium();
                }

    public function topic(){

        return $this->hasMany(Topic::class,'sub_id');
    }
}
