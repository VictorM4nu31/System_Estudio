<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'tutor_id',
        'name',
        'email',
        'relationship',
    ];
}
