<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonSetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('season_set', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('season_id');
            $table->unsignedBigInteger('set_id');
            $table->foreign('season_id')->references('id')->on('season')->onDelete('cascade');
            $table->foreign('set_id')->references('id')->on('sets')->onDelete('cascade');

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
        Schema::table('season_set', function (Blueprint $table) {
            //
        });
    }
}
