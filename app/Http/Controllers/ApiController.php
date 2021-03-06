<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
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

    public function callback(SpotifyWebAPI\Session $session, SpotifyWebAPI\SpotifyWebAPI $api)
    {
        try {

            $session->requestAccessToken(request()->input('code'));
            $accessToken = $session->getAccessToken();
            session(['access_token' => $accessToken]);
            $this->getToken($api);
        } catch (\Exception $e) {
            return redirect()->route('profile');
        }
        return redirect()->route('home');
    }

    private function getToken($api)
    {
        $api->setAccessToken(session()->get('access_token'));

        return $api;
    }

    public function search(SpotifyWebAPI\SpotifyWebAPI $api, $type)
    {

        $query = request()->input('q');
        if ($query === null) {
            session()->flash('empty', 'Please fill out the input field');
            return Redirect::back();
        }
        session(['query' => $query]);
        session(['type' => $type]);

        try {
            $this->getToken($api);
            $results = $api->search($query, $type);
        } catch (\Exception $e) {

            return redirect()->route('auth');
        }

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

        session(['playlists' => $lists]);
        session(['query' => $query]);
        return view('books.playlists', [
            'lists' => $lists,
            'query' => $query,
        ]);
    }

    public function reRender()
    {
        return view('books.playlists', [
            'lists' => session()->get('playlists'),
            'query' => session()->get('query'),
        ]);
    }
    public function renderPlaylistSongs(SpotifyWebAPI\SpotifyWebAPI $api)
    {
        $this->getToken($api);
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

    public function exportPlaylist(SpotifyWebAPI\SpotifyWebAPI $api, Book $book)
    {
        if (Gate::allows('bookCRUD', $book)) {
            request()->validate([
                'spotify_name' => 'required|string'
            ]);

            if ($book->songs()->get()->where('track_id')->isEmpty()) {
                session()->flash('export', "Looks like this book doesn't contain exportable songs. Search with Spotify to add songs and playlists.");
                return Redirect::back();
            }
            try {
                $this->getToken($api);
                $api->createPlaylist([
                    'name' => request()->spotify_name,
                    'public' => false
                ]);
            } catch (\Exception $e) {

                return redirect()->route('auth');
            }
            $response = $api->getRequest()->getLastResponse();
            $playlist_id = $response['body']->id;
            $data['playlist_id'] = $playlist_id;
            $book->update($data);

            $songs = $book->songs()->get()->where('track_id');
            $tracks = [];
            foreach ($songs as $song) {
                array_push($tracks, $song->track_id);
            };

            $api->addPlaylistTracks($playlist_id, $tracks);
            session()->flash('export', 'Great! Now you can listen to your book on Spotify');

            return Redirect::back();
        }
    }
}
