<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'guild_id',
        'teacher_id',
        'description',
    ];
}
