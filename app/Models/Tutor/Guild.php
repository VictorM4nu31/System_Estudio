<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'name',
        'code',
        'description',
    ];
}
