<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'student_id',
        'joined_at',
    ];
}
