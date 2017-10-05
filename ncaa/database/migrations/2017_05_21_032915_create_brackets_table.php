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
            $table->string('short_description')->nullable();
            $table->string('long_description')->nullable();
            $table->boolean('active')->default(false);
            $table->integer('round')->default(0);
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
        Schema::dropIfExists('brackets');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
