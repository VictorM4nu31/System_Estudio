<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'date',
        'present',
    ];
}
