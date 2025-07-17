<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;

class AcademicData extends Model
{
    protected $fillable = [
        'student_id',
        'school',
        'grade',
        'enrollment',
        'updated_at',
    ];
}
