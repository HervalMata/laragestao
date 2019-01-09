<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchanges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unit_id')->unsigned();
            $table->integer('user1_id')->unsigned();
            $table->integer('team1_id')->unsigned();
            $table->integer('user2_id')->unsigned();
            $table->integer('team2_id')->unsigned();
            $table->date('date1');
            $table->integer('turn1_id')->unsigned();
            $table->integer('type1_id')->unsigned();
            $table->integer('type2_id')->unsigned();
            $table->integer('turn2_id')->unsigned();
            $table->date('date2');
            $table->integer('type3_id')->unsigned();
            $table->integer('type4_id')->unsigned();
            $table->integer('situation_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('user1_id')->references('id')->on('users');
            $table->foreign('user2_id')->references('id')->on('users');
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->foreign('turn1_id')->references('id')->on('turns');
            $table->foreign('turn2_id')->references('id')->on('turns');
            $table->foreign('type1_id')->references('id')->on('types');
            $table->foreign('type2_id')->references('id')->on('types');
            $table->foreign('type3_id')->references('id')->on('types');
            $table->foreign('type4_id')->references('id')->on('types');
            $table->foreign('situation_id')->references('id')->on('situations');
            $table->string('name')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exchanges');
    }
}
