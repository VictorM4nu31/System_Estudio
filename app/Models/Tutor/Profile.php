<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'data',
    ];
}
