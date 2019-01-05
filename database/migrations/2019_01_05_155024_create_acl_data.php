<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use GestaoTrocasUser\Models\Role;
use GestaoTrocasUser\Models\User;

class CreateAclData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleAdmin = Role::create([
            'name' => config('gestaotrocasuser.acl.role_admin'),
            'description' => 'Papel de usuário mestre do sistema'
        ]);

        $user = User::where('email', config('gestaotrocasuser.user-default.email'))->first();
        $user->roles()->save($roleAdmin);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $roleAdmin = Role::where('name', 'Admin')->first();
        $user = User::where('email', config('gestaotrocasuser.user-default.email'))->first();
        $user->roles()->detach($roleAdmin->id);
        $roleAdmin->delete();
    }
}
