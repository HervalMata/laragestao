<?php

use Illuminate\Database\Seeder;
use GestaoTrocasUnidades\Models\Unit;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Unit::class, 50)->create();
    }
}
