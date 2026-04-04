<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevTask extends Model
{
    protected $fillable = ['title', 'description', 'stack', 'format', 'active', 'sort_order'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'active' => 'boolean',
    ];
}
