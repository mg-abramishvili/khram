<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'image', 'image_as_icon', 'video', 'pdf', 'gallery', 'parent_id'
    ];
    
    protected $casts=['gallery'=>'json'];

    public function children()
    {
        return $this->hasMany('App\Models\Page', 'parent_id', 'id');
    }

    public function types()
    {
        return $this->belongsToMany('App\Models\Type');
    }

    public function icons()
    {
        return $this->belongsToMany('App\Models\Icon');
    }
}
