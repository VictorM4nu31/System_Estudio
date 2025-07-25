<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guild extends Model
{
    protected $table = 'teacher_guilds';

    protected $fillable = [
        'name',
        'code',
        'description',
        'teacher_id',
    ];

    public function missions(): HasMany
    {
        return $this->hasMany(Mission::class, 'guild_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'guild_id');
    }

    public function shops(): HasMany
    {
        return $this->hasMany(Shop::class, 'guild_id');
    }

    public function teacher()
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }
}
