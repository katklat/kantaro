<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;
use App\Basket;
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
                'ugc-image-upload',
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

        return redirect('/');
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
                return $this->renderPlaylists($results, $query, request()->basket);
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

    private function renderPlaylists(object $results, string $query, $basket)
    {
        $lists = $results->playlists->items;

        return view('baskets.playlists', [
            'lists' => $lists,
            'query' => $query,
            'basket' => $basket
        ]);
    }

    public function renderPlaylistSongs(SpotifyWebAPI\SpotifyWebAPI $api)
    {
        $api->setAccessToken(session()->get('access_token'));
        $songs = $api->getPlaylistTracks(request()->playlist_id)->items;
        $basket = request()->basket;
        return view('baskets.import', [
            'songs' => $songs,
            'basket' => $basket
        ]);
    }

    public function importPlaylist(SpotifyWebAPI\SpotifyWebAPI $api, Request $request)
    {
        $api->setAccessToken(session()->get('access_token'));
        foreach (request()->track_ids as $track_id) {
            $this->getSongData($api, $track_id, request()->basket);
        };
    }

    private function getSongData(SpotifyWebAPI\SpotifyWebAPI $api, string $track_id, $basket)
    {
        $track = $api->getTrack($track_id);

        $song_data = [
            'title' => $track->name,
            'artist' => $track->artists[0]->name,
            'track_id' => $track->id,
            'artist_id' => $track->artists[0]->id
        ];

        Song::store($song_data, $basket);
    }

    public function exportPlaylist(SpotifyWebAPI\SpotifyWebAPI $api, Request $request, Basket $basket)
    {
        request()->validate([
            'spotify_name' => 'required|string'
        ]);

        $api->setAccessToken(session()->get('access_token'));
        $api->createPlaylist([
            'name' => request()->spotify_name,
            'public' => false
        ]);

        $response = $api->getRequest()->getLastResponse();
        $playlist_id = $response['body']->id;

        $songs = $basket->songs()->get();
        $tracks = [];
        foreach ($songs as $song) {
            array_push($tracks, $song->track_id);
        };

        $api->addPlaylistTracks($playlist_id, $tracks);
        return redirect()->route('baskets.index');
    }
}
