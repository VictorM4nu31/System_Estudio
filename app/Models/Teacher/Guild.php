<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'teacher_id',
    ];
}
