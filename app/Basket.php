<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = ['name', 'entry', 'occasion', 'location', 'month', 'year', 'image', 'emoji'];

    public function songs()
    {
        return $this->belongsToMany('App\Song');
    }
}
