<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $table = 'student_profiles';
    
    protected $fillable = [
        'student_id',
        'avatar',
        'level',
        'experience',
        'title',
        'customization',
        'guild_id',
        'points',
        'matricula',
        'numero_lista',
    ];

    public function guild(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Teacher\Guild::class, 'guild_id');
    }
}
