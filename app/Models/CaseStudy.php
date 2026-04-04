<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = ['tag', 'title', 'description', 'tech', 'label', 'color1', 'color2', 'text_color', 'category', 'sort_order', 'active'];

    protected $casts = [
        'tag' => 'array',
        'title' => 'array',
        'description' => 'array',
        'active' => 'boolean',
    ];
}
