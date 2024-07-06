<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';
    protected $fillable = [
        'title', 'document_path', 'student_id',
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}
