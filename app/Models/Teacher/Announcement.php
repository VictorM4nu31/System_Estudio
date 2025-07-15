<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'content',
        'guild_id',
        'teacher_id',
    ];
}
