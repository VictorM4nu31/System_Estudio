<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'guild_id',
        'teacher_id',
        'description',
    ];
}
