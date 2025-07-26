<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    protected $table = 'teacher_team_members';

    protected $fillable = [
        'team_id',
        'student_id',
        'role',
        'joined_at',
    ];

    protected $casts = [
        'joined_at' => 'datetime',
    ];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'student_id');
    }
}
