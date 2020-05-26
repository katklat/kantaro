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
        } else {
            $user_id = Auth::user()->id;
            $profile = Profile::where('user_id', '=', "$user_id")->get()->toArray();
            return Storage::url($profile[0]['defaultImage']);
        }
    }
}
