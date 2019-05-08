<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pointable_id');
            $table->string('pointable_type');
            $table->tinyIncrements('point_id');
            $table->text('comment');
            $table->foreign('point_id')->references('id')->on('points')->onDelete('cascade');
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
        Schema::dropIfExists('pointables');
    }
}
