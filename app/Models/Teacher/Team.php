<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'guild_id',
        'teacher_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'max_members' => 'integer',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class, 'guild_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }

    public function members(): HasMany
    {
        return $this->hasMany(TeamMember::class, 'team_id');
    }
}
