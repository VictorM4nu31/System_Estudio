<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    protected $table = 'teacher_announcements';

    protected $fillable = [
        'title',
        'content',
        'guild_id',
        'teacher_id',
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
