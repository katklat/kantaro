<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $fillable = ['name', 'entry', 'occasion', 'location', 'month', 'year', 'image', 'emoji', 'playlist_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

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