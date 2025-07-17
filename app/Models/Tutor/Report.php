<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'month',
        'content',
    ];
}
