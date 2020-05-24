<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
use App\Song;


class SearchController extends Controller
{
    public function index()
    {
        $query = request()->input('q');

        $books = Book::where('name', 'LIKE', "%$query%")
            ->orWhere('entry', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->get();

        $songs = Song::where('title', 'LIKE', "%$query%")
            ->orWhere('artist', 'LIKE', "%$query%")
            ->orWhere('entry', 'LIKE', "%$query%")
            ->get();

        return view('search', [
            'books' => $books,
            'songs' => $songs,
            'query' => $query
        ]);
    }

    public function random()
    {

        if (DB::table('songs')->count() == 0) {
            session()->flash('empty', 'Here you could see a random song from your collection. There are no songs in your collection yet.');
            return view('home');
        }
        $randomSong = DB::table('songs')
            ->inRandomOrder()
            ->first();

        $imgUrl = Song::find($randomSong->id)
            ->imageUrl($randomSong->image);

        return view('home', ['song' => $randomSong, 'imgUrl' => $imgUrl]);
    }
}
