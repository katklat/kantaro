<?php

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;
use App\Basket;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderBy = 'created_at';
        return view('songs/index', [
            'songs' => Song::all()->sortByDesc($orderBy)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Song::create($data);

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
        return view('songs.show', ['song' => $song]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        return view('songs/edit', [
            'song' => $song,
            'baskets' => Basket::all(),
            'selectedBaskets' => $song->baskets
        ]);
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
        $data = $this->validateSongDetails();
        if ($request->has('image')) {
            $path = $request->file('image')->store('/songs/images', 'public');
            $data['image'] = $path;
        }
        $song->update($data);
        $song->baskets()->sync($request->input('baskets'));

        return redirect()->route('songs.show', ['song' => $song]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index');
    }
    private function validateSongData()
    {
        return request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'track_id' => 'nullable',
            'artist_id' => 'nullable'

        ]);
    }
    private function validateSongDetails()
    {
        return request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'entry' => 'nullable',
            'emoji' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'basket' => 'exists: baskets,id',
        ]);
    }
}
