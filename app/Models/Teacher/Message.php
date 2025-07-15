<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'content',
        'guild_id',
        'teacher_id',
        'recipient_id',
    ];
}
