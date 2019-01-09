<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Artisan::call('gestaotrocasuser:make-permission');
        $this->call(UnitsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TurnsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(SituationsTableSeeder::class);
        $this->call(ExchangesTableSeeder::class);
    }
}
