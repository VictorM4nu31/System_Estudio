<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'description',
    ];
}
