<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'mission_id',
        'teacher_id',
        'due_date',
    ];
}
