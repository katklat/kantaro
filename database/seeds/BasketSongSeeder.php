<?php

use Illuminate\Database\Seeder;

class BasketSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = App\Song::all();

        App\Basket::all()->each(function ($basket) use ($songs) {
            $basket->songs()->attach(
                $songs->random(rand(5, 20))->pluck('id')->toArray()
            );
        });
    }
}
