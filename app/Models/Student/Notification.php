<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'type',
        'content',
        'sent_at',
    ];
}
