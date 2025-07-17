<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'mission_id',
        'student_id',
        'status',
        'due_date',
    ];
}
