<?php

use Illuminate\Database\Seeder;
use GestaoTrocasExchange\Models\Situation;

class SituationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Situation::create([
            'name' => 'Autorizada'
        ]);
        Situation::create([
            'name' => 'Cadastrada'
        ]);
        Situation::create([
            'name' => 'Cancelada'
        ]);
        Situation::create([
            'name' => 'Concluída'
        ]);
        Situation::create([
            'name' => 'Confirmada'
        ]);
        Situation::create([
            'name' => 'Pendente'
        ]);
        Situation::create([
            'name' => 'Rejeitada'
        ]);
    }
}
