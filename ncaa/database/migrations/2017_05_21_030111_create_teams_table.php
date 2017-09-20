<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('school_name');
            $table->string('short_name')->nullable();
            $table->string('conference')->nullable();
            $table->string('mascot')->nullable();
            $table->string('state')->nullable();
            $table->string('image_file')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });

        // Pupulate the database with teams
        // DB::table('teams')->insert(
        //     array(
        //         'email' => 'name@domain.com',
        //         'verified' => true
        //     )
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
