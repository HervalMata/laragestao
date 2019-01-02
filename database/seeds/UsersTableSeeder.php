<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\GestaoTrocas\Models\User::class)->create([
            'enrolment' => 'oooo',
            'password' => bcrypt('admin')
        ]);

        factory(\GestaoTrocas\Models\User::class, 100)->create();
    }
}
