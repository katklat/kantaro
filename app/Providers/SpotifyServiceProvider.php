<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SpotifyWebAPI;

class SpotifyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(SpotifyWebAPI\Session::class, function ($app) {

            $redirect_uri = 'http://kantaro.test/spoti';
            $client_id = config('spotify.client_id');
            $client_secret = config('spotify.client_secret');

            return new SpotifyWebAPI\Session(
                $client_id,
                $client_secret,
                $redirect_uri
            );
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
