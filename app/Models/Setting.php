<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'orientation',
        'title',
        'logo',
        'nta',
        'serial_key',
        'module_news',
        'module_photoalbums',
        'module_videoalbums',
        'module_routes',
        'module_reviews',
    ];
}
