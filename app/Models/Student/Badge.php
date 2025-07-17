<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'name',
        'description',
        'student_id',
        'unlocked',
    ];
}
