<?php

use Illuminate\Database\Seeder;
use GestaoTrocasExchange\Models\Exchange;

class ExchangesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Exchange::class, 200)->create();
    }
}
