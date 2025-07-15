<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
