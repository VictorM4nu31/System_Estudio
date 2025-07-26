<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    protected $table = 'teacher_events';

    protected $fillable = [
        'name',
        'description',
        'date',
        'location',
        'event_type',
        'capacity',
        'guild_id',
        'teacher_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'capacity' => 'integer',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class, 'guild_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
