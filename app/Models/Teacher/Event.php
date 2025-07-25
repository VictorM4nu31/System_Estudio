<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;

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
    ];

    protected $casts = [
        'date' => 'datetime',
        'capacity' => 'integer',
    ];
}
