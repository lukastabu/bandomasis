<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'title' => 'Arabia',
            'city' => 'Vilnius',
            'address' => 'Jogailos 3',
            'open' => '10-22',
        ]);
        DB::table('restaurants')->insert([
            'title' => 'BonBon',
            'city' => 'Kaunas',
            'address' => 'Mindaugo 1',
            'open' => '11-23',
        ]);

        DB::table('food')->insert([
            'name' => 'Cepelinski',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/48/Cepelinai_Sauce.JPG/250px-Cepelinai_Sauce.JPG',
            'rating' => 5,
            'price' => 5,
            'restaurant_id' => 1, 
        ]);
        DB::table('food')->insert([
            'name' => 'Pizza',
            'photo' => 'http://italiankitchenmd.com/wp-content/uploads/2015/06/pic-pizza.png',
            'rating' => 4,
            'price' => 8,
            'restaurant_id' => 2, 
        ]);
        DB::table('food')->insert([
            'name' => 'Ketchup-cheese Pancake',
            'photo' => 'http://italiankitchenmd.com/wp-content/uploads/2015/06/pic-pizza.png',
            'rating' => 3,
            'price' => 6,
            'restaurant_id' => 1, 
        ]);

        DB::table('users')->insert([
            'name' => 'algis',
            'email' => 'algis'.'@gmail.com',
            'password' => Hash::make('algis'), 
            'role' => 5,
        ]);
        DB::table('users')->insert([
            'name' => 'bronius',
            'email' => 'bronius'.'@gmail.com',
            'password' => Hash::make('bronius'),
        ]);

    }
}
