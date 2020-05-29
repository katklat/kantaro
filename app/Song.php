<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class Song extends Model
{
    protected $fillable = ['title', 'artist', 'entry', 'track_id', 'artist_id', 'image', 'emoji', 'user_id'];

    public function books()
    {
        return $this->belongsToMany('App\Book');
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

    public static function store(array $song_data)
    {
        $song = [
            'title' => $song_data[0],
            'artist' => $song_data[1],
            'track_id' => $song_data[2],
            'artist_id' => $song_data[3],
            'user_id' => Auth::user()->id
        ];
        Song::create($song)->books()->sync(session()->get('book'));
    }
}
