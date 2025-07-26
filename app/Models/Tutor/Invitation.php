<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'tutor_invitations';
    
    protected $fillable = [
        'tutor_id',
        'student_id',
        'status',
        'accepted_at',
        'token',
        'correo_tutor',
    ];
}
