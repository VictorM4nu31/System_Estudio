<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'tutor_id',
        'teacher_id',
        'student_id',
        'message',
        'sent_at',
    ];
}
