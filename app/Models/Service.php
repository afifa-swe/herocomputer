<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['num', 'title', 'description', 'sort_order', 'active'];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'active' => 'boolean',
    ];
}
