<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSubject extends Model
{
    use HasFactory;

    public $table='home_subjects';
    public $fillable=['subject_title','subject_code','description','sub_image','type','subject_banner'];
}
