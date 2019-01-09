<?php

use Illuminate\Database\Seeder;
use GestaoTrocasExchange\Models\Turn;

class TurnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Turn::create([
            'name' => '1º Turno'
        ]);
        Turn::create([
            'name' => '2º Turno'
        ]);
        Turn::create([
            'name' => '3º Turno'
        ]);
    }
}
