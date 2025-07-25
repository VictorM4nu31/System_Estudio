<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teacher_teams';

    protected $fillable = [
        'name',
        'description',
        'team_type',
        'max_members',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'max_members' => 'integer',
    ];
}
