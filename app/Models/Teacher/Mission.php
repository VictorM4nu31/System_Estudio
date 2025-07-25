<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    protected $table = 'teacher_missions';

    protected $fillable = [
        'title',
        'description',
        'guild_id',
        'teacher_id',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher\Guild::class, 'guild_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
