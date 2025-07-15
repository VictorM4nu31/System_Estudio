<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'guild_id',
        'teacher_id',
        'date',
        'description',
    ];
}
