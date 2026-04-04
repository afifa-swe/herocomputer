<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevApplication extends Model
{
    protected $fillable = ['name', 'telegram', 'stack', 'experience', 'portfolio_link', 'about', 'read'];
}
