<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SpotifyWebAPI;
use App\Book;
use App\Song;


class ApiController extends Controller
{
    public function authenticate(SpotifyWebAPI\Session $session)
    {

        $options = [
            'scope' => [
                'playlist-read-private',
                'user-read-private',
                'playlist-modify-private',
            ],
            'auto_refresh' => true,
            'return_assoc' => true
        ];

        return redirect($session->getAuthorizeUrl($options));
    }

    public function callback(SpotifyWebAPI\Session $session)
    {
        $session->requestAccessToken(request()->input('code'));

        $accessToken = $session->getAccessToken();
        $refreshToken = $session->getRefreshToken();

        session(['access_token' => $accessToken]);
        session(['refresh_token' => $refreshToken]);

        return redirect('/home');
    }

    public function search(SpotifyWebAPI\SpotifyWebAPI $api, $type)
    {
        $query = request()->input('q');
        $api->setAccessToken(session()->get('access_token'));
        $results = $api->search($query, $type);

        switch ($type) {
            case 'track':
                return $this->renderSongs($results, $query);
                break;
            case 'playlist':
                if (!session('book')) {
                    session(['book' => request()->book]);
                }
                return $this->renderPlaylists($results, $query);
                break;
        }
    }

    private function renderSongs(object $results, string $query)
    {
        $songs = $results->tracks->items;

        return view('songs.create', [
            'songs' => $songs,
            'query' => $query
        ]);
    }

    private function renderPlaylists(object $results, string $query)
    {
        $lists = $results->playlists->items;

        return view('books.playlists', [
            'lists' => $lists,
            'query' => $query,
        ]);
    }

    public function renderPlaylistSongs(SpotifyWebAPI\SpotifyWebAPI $api)
    {
        $api->setAccessToken(session()->get('access_token'));
        $songs = $api->getPlaylistTracks(request()->playlist_id)->items;

        return view('books.import', [
            'songs' => $songs

        ]);
    }
    public function importPlaylist()
    {
        //this is zipping the arrays from the request parameters
        $songs_data = array_map(null, request()->titles, request()->artist_names, request()->track_ids,  request()->artist_ids);
        //the loop checks if a hidden id is among the chosen songs
        foreach ($songs_data as $song_data) {
            if (in_array($song_data[2], request()->selected_ids))
                Song::store($song_data);
        }
        $book = session('book');
        session()->forget('book');
        return redirect()->route('books.show', ['book' => $book]);
    }

    public function exportPlaylist(SpotifyWebAPI\SpotifyWebAPI $api, Request $request, Book $book)
    {
        request()->validate([
            'spotify_name' => 'required|string'
        ]);

        if ($book->songs()->get()->isEmpty()) {
            session()->flash('export', 'Please add some songs to the book before exporting');
            return Redirect::back();
        }
        $api->setAccessToken(session()->get('access_token'));
        $api->createPlaylist([
            'name' => request()->spotify_name,
            'public' => false
        ]);

        $response = $api->getRequest()->getLastResponse();
        $playlist_id = $response['body']->id;
        $data['playlist_id'] = $playlist_id;
        $book->update($data);

        $songs = $book->songs()->get();
        $tracks = [];
        foreach ($songs as $song) {
            array_push($tracks, $song->track_id);
        };

        $api->addPlaylistTracks($playlist_id, $tracks);
        session()->flash('export', 'Spotify playlist was created');

        return Redirect::back();
    }
}
