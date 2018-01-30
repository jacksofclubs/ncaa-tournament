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
            $table->foreign('draft_id')->references('id')->on('drafts')->onDelete('cascade');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('draft_teams');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
