<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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
        } elseif (User::find(Auth::user()->id)->profile) {
            $profile = User::find(Auth::user()->id)->profile;
            if (strlen($profile->defaultImage) > 0)
                return Storage::url($profile->defaultImage);
        } else return null;
    }
}
