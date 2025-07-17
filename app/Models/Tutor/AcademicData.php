<?php

namespace App\Models\Tutor;

use Illuminate\Database\Eloquent\Model;

class AcademicData extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'school',
        'enrollment',
        'grade',
    ];
}
