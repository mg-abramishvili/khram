<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'image',
    ];

    public function r01routes()
    {
        return $this->belongsToMany('App\Models\R01route');
    }

    public function r02routes()
    {
        return $this->belongsToMany('App\Models\R02route');
    }

    public function r03routes()
    {
        return $this->belongsToMany('App\Models\R03route');
    }

    public function r04routes()
    {
        return $this->belongsToMany('App\Models\R04route');
    }

    public function r05routes()
    {
        return $this->belongsToMany('App\Models\R05route');
    }

    public function r06routes()
    {
        return $this->belongsToMany('App\Models\R06route');
    }

    public function r07routes()
    {
        return $this->belongsToMany('App\Models\R07route');
    }

    public function r08routes()
    {
        return $this->belongsToMany('App\Models\R08route');
    }

    public function r09routes()
    {
        return $this->belongsToMany('App\Models\R09route');
    }

    public function r10routes()
    {
        return $this->belongsToMany('App\Models\R10route');
    }

}
