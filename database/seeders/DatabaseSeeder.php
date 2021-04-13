<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
    
   
   #      \App\Models\Game::factory(1)->create();
    #    \App\Models\Card::factory(1)->create();
        \App\Models\CardItems::factory(5)->create();
    }
}
