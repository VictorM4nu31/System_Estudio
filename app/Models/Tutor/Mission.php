<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'title',
        'description',
        'status',
        'due_date',
    ];
}
