<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'description',
        'guild_id',
        'student_id',
        'participated',
        'date',
    ];
}
