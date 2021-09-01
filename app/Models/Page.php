<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'text2',
        'text3',
        'text4',
        'text5',
        'text6',
        'text7',
        'text8',
        'text9',
        'text10',
        'text11',
        'text12',
        'text13',
        'text14',
        'text15',
        'image',
        'image_as_icon',
        'video',
        'pdf',
        'gallery',
        'parent_id'
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
