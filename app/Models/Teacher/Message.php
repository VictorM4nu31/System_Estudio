<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $table = 'teacher_messages';

    protected $fillable = [
        'content',
        'recipient_id',
        'guild_id',
        'teacher_id',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class, 'guild_id');
    }

    public function recipient(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'recipient_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
