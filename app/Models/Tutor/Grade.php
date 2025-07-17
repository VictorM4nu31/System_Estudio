<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'subject',
        'grade',
    ];
}
