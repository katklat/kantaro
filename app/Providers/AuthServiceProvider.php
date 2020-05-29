<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\BookPolicy;
use App\Book;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Book::class => BookPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('bookCRUD', function ($user, $book) {
            return $user->id === $book->user_id;
        });

        Gate::define('songCRUD', function ($user, $song) {
            return $user->id === $song->user_id;
        });

        Gate::define('profileCRUD', function ($user, $profile) {
            return $user->id === $profile->user_id;
        });
    }
}
