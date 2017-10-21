<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDraftTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('draft_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->string('region');
            $table->string('seed');
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
        Schema::dropIfExists('draft_teams');
    }
}
