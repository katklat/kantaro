<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->insert([
            [
                'title' => 'The robot who lost its head',
                'artist' => 'Buckethead'
            ]
        ]);
    }
}
