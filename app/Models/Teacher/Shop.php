<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shop extends Model
{
    protected $table = 'teacher_shops';

    protected $fillable = [
        'name',
        'guild_id',
        'teacher_id',
        'description',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(Guild::class, 'guild_id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher::class, 'teacher_id');
    }

    public function rewards(): HasMany
    {
        return $this->hasMany(Reward::class, 'shop_id');
    }
}
