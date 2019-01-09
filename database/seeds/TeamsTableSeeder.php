<?php

use Illuminate\Database\Seeder;
use GestaoTrocasExchange\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::create([
            'name' => 'A'
        ]);
        Team::create([
            'name' => 'B'
        ]);
        Team::create([
            'name' => 'C'
        ]);
        Team::create([
            'name' => 'D'
        ]);
        Team::create([
            'name' => 'E'
        ]);
    }
}
