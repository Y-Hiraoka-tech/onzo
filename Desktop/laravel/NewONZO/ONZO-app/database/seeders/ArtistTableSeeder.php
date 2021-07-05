<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert(
            [   'name'=>"アーティストアカウント",
                'email'=>"artist@artist.com",
                'password'=>Hash::make("password"),
                'phone' =>"08000000000"
            ]);
    }
}