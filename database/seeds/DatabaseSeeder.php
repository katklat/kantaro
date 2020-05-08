<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BasketSeeder::class);
        //$this->call(SongSeeder::class);
        $this->call(BasketSongSeeder::class);
    }
}
