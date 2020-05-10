<?php

//use App\Http\Controllers\Controller;
use App\Song;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Song;
use Illuminate\Http\Request;

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
        return view('songs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateNewData();
        if ($request->has('image')) {
            $path = $request->file('image')->store('/songs/images', 'public');
            $data['image'] = $path;
        }

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
        return view('songs/edit', ['song' => $song]);
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
        $data = $this->validateData();
        if ($request->has('image')) {
            $path = $request->file('image')->store('/songs/images', 'public');
            $data['image'] = $path;
        }
        $song->update($data);
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
    private function validateNewData()
    {
        return request()->validate([
            'title' => 'required',
            'artist' => 'required',
            'entry' => 'min:3',
            'emoji' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }
    private function validateData()
    {
        return request()->validate([
            'entry' => 'min:3',
            'emoji' => '',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }
}
