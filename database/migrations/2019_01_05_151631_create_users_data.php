<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use GestaoTrocasUser\Models\User;
use GestaoTrocasUnidades\Models\Unit;
use Illuminate\Database\Eloquent\Model;

class CreateUsersData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Unit::create([
            'name' => 'Sede',
            'sector' => 'Gerência',
            'state' => 'Ba',
            'city' => 'Camaçari'
        ]);
        Model::unguard();
        User::create([
            'name' => config('gestaotrocasuser.user-default.name'),
            'email' => config('gestaotrocasuser.user-default.email'),
            'password' => bcrypt(config('gestaotrocasuser.user-default.password')),
            'enrolment' => config('gestaotrocasuser.user-default.enrolment'),
            'unit_id' => config('gestaotrocasuser.user-default.unit_id'),
            'verified' => true
        ]);
        Model::reguard();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::disableForeignKeyConstraints();
        $user = User::where('email', config('gestaotrocasuser.user-default.email'))->first();
        $user->forceDelete();
        \Schema::enableForeignKeyConstraints();
    }
}
