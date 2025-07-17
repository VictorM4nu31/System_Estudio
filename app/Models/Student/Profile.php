<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'student_id',
        'avatar',
        'level',
        'experience',
        'title',
        'customization',
    ];
}
