<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Basket extends Model
{
    protected $fillable = ['name', 'entry', 'occasion', 'location', 'month', 'year', 'image', 'emoji'];

    public function songs()
    {
        return $this->belongsToMany('App\Song');
    }
    public function imageUrl($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return 'https://lorempixum.com/400/200/nature/?87706';
    }
}
