<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'tutor_id',
        'student_id',
        'status',
        'accepted_at',
    ];
}
