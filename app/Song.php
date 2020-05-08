<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'artist', 'entry', 'track_id', 'artist_id', 'image', 'emoji'];

    public function baskets()
    {
        return $this->belongsToMany('App\Basket');
    }
}
