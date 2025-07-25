<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'teacher_announcements';

    protected $fillable = [
        'title',
        'content',
    ];
}
