<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'name',
        'description',
        'unlocked',
    ];
}
