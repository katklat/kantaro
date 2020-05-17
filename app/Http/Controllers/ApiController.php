<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI;


class ApiController extends Controller
{
    public function authenticate(SpotifyWebAPI\Session $session)
    {

        $options = [
            'scope' => [
                'playlist-read-private',
                'user-read-private'
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
        $baskets = $results->playlists->items;

        return view('baskets.playlists', [
            'baskets' => $baskets,
            'query' => $query
        ]);
    }
}
