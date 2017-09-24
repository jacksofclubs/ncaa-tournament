<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBracketMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bracket_mapping', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bracket_id')->unsigned();
            // Add foreign key constraint
            $table->foreign('bracket_id')->references('id')->on('brackets');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('region');
            $table->integer('seed');
            $table->integer('points');
            $table->boolean('active');
            $table->integer('wins');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('bracket_mapping');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
