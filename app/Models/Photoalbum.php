<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photoalbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'cover', 'gallery'
    ];

    protected $casts=['gallery'=>'json'];
}
