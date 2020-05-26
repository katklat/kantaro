<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Song;
use Illuminate\Http\Request;
use App\Book;


class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $orderBy = 'created_at';
        return view('songs/index', [
            'songs' => Song::all()
                ->where('user_id', $user)
                ->sortByDesc($orderBy)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!session('book')) {
            session(['book' => preg_replace('/[^0-9]/', '', url()->previous())]);
        }
        return view('songs/search');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateSongData();
        $data['user_id'] = Auth::user()->id;
        $song = Song::create($data);
        if (session('book')) {
            $song->books()->sync(session('book'));
            $book = session('book');
            session()->forget('book');
            return redirect()->route('books.show', ['book' => $book]);
        }
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     *x
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        if (Gate::allows('songCRUD', $song)) {

            return view('songs.show', ['song' => $song]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        if (Gate::allows('songCRUD', $song)) {
            return view('songs/edit', [
                'song' => $song,
                'books' => Book::all(),
                'selectedBooks' => $song->books
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        if (Gate::allows('songCRUD', $song)) {

            $data = $this->validateSongDetails();
            if ($request->has('image')) {
                $path = $request->file('image')->store('/songs/images', 'public');
                $data['image'] = $path;
            }
            $song->update($data);
            $song->books()->sync($request->input('books'));

            return redirect()->route('songs.show', ['song' => $song]);
        }
    }
    public function updateImage(Request $request, Song $song)
    {
        if (Gate::allows('songCRUD', $song)) {

            if ($request->has('delete')) {
                $data['image'] = '';
                $song->update($data);
            } else {
                if (strlen($_FILES['image']['name']) > 0) {
                    $path = $request->file('image')->store('/songs/images', 'public');
                    $data['image'] = $path;
                    $song->update($data);
                }
            }

            return redirect()->route('songs.show', ['song' => $song]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        if (Gate::allows('songCRUD', $song)) {
            $song->delete();

            return redirect()->route('songs.index');
        }
    }
    private function validateSongData()
    {
        return request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'track_id' => 'nullable',
            'artist_id' => 'nullable',
            'book' => 'exists: books,id|nullable',

        ]);
    }
    private function validateSongDetails()
    {
        return request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'entry' => 'nullable',
            'emoji' => 'nullable',
            'image' => 'nullable',
            'book' => 'exists: books,id',
        ]);
    }
}
