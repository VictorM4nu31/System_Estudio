<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'student_id',
        'item',
        'quantity',
    ];
}
