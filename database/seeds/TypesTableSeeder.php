<?php

use Illuminate\Database\Seeder;
use GestaoTrocasExchange\Models\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'TT'
        ]);
        Type::create([
            'name' => 'TF'
        ]);
    }
}
