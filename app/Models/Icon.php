<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
    ];

    public function pages()
    {
        return $this->belongsToMany('App\Models\Page');
    }
}
