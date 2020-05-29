<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Song;


class SearchController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $query = request()->input('q');

        $books = Book::where('name', 'LIKE', "%$query%")
            ->where('user_id', $user)
            ->orWhere('entry', 'LIKE', "%$query%")
            ->orWhere('location', 'LIKE', "%$query%")
            ->get();

        $songs = Song::where('title', 'LIKE', "%$query%")
            ->where('user_id', $user)
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
        if (strpos(url()->previous(), 'register'))
            return redirect()->route('welcome');

        $user = Auth::user()->id;

        if (DB::table('songs')->where('user_id', $user)->count() == 0) {
            session()->flash('empty', 'Here you could see a random song from your collection. There are no songs in your collection yet.');
            return view('home');
        }
        $randomSong = DB::table('songs')
            ->where('user_id', $user)
            ->inRandomOrder()
            ->first();

        $imgUrl = Song::find($randomSong->id)
            ->imageUrl($randomSong->image);

        return view('home', ['song' => $randomSong, 'imgUrl' => $imgUrl]);
    }
}
