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
        factory(\App\Models\User::class)->create([
            'enrolment' => 'oooo',
            'password' => bcrypt('admin')
        ]);

        factory(\App\Models\User::class, 100)->create();
    }
}
