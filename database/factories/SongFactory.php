<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'title' => $faker->bs,
        'artist' => $faker->company,
        'entry' => $faker->paragraph,
        'track_id' => $faker->regexify('[A-Za-z0-9]{22}'),
        'artist_id' => $faker->regexify('[A-Za-z0-9]{22}'),
        'image' => $faker->imageUrl($width = 400, $height = 200, 'people'),
        'emoji' => $faker->emoji
    ];
});
