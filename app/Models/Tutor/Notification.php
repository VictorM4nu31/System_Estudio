<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'tutor_id',
        'student_id',
        'type',
        'content',
        'read',
        'configured',
        'sent_at',
    ];
}
