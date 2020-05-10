<?php

namespace App;





use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    protected $fillable = ['title', 'artist', 'entry', 'track_id', 'artist_id', 'image', 'emoji'];

    public function baskets()
    {
        return $this->belongsToMany('App\Basket');
    }

    public function imageUrl($value)
    {
        if ($value) {
            return Storage::url($value);
        }

        return 'https://lorempixum.com/400/200/nature/?87706';
    }
}
