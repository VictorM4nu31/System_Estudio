<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'score',
        'progress',
        'grades',
    ];
}
