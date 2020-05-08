<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Basket;
use Faker\Generator as Faker;

$factory->define(Basket::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase,
        'entry' => $faker->paragraph,
        'occasion' => $faker->randomElement($array = array('travel', 'festival', 'other')),
        'location' => $faker->country,
        'month' => $faker->monthName,
        'year' => $faker->year($max = 'now'),
        'image' => $faker->imageUrl($width = 400, $height = 200, 'nature'),
        'emoji' => $faker->emoji
    ];
});
