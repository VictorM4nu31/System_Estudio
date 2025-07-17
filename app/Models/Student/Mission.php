<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'title',
        'description',
        'guild_id',
        'student_id',
        'status',
        'due_date',
    ];
}
