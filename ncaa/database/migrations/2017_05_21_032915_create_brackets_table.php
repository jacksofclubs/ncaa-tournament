<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBracketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brackets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('region');
            $table->integer('seed');
            $table->integer('points');
            $table->boolean('active');
            $table->integer('furthest_round');
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
        Schema::dropIfExists('brackets');
    }
}
