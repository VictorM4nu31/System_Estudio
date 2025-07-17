<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    protected $fillable = [
        'name',
        'description',
        'cost',
        'student_id',
        'redeemed',
    ];
}
