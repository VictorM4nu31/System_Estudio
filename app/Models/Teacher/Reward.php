<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'name',
        'shop_id',
        'guild_id',
        'teacher_id',
        'description',
        'cost',
    ];
}
