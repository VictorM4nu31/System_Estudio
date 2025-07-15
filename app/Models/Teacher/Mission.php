<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'title',
        'description',
        'guild_id',
        'teacher_id',
        'due_date',
    ];
}
