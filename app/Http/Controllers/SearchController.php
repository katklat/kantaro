<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use Illuminate\Support\Facades\DB;
use App\Basket;
use App\Song;


class SearchController extends Controller
{
    public function index()
    {
        $query = request()->input('q');

        $baskets = Basket::where('name', 'LIKE', "%$query%")
            ->orWhere('entry', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->get();

        $songs = Song::where('title', 'LIKE', "%$query%")
            ->orWhere('artist', 'LIKE', "%$query%")
            ->orWhere('entry', 'LIKE', "%$query%")
            ->get();

        return view('search', [
            'baskets' => $baskets,
            'songs' => $songs,
            'query' => $query
        ]);
    }

    public function random()
    {
        $randomSong = DB::table('songs')
            ->inRandomOrder()
            ->first();

        $imgUrl = Song::find($randomSong->id)
            ->imageUrl($randomSong->image);

        return view('home', ['song' => $randomSong, 'imgUrl' => $imgUrl]);
    }
}
