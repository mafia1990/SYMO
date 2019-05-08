<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cloth_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->unsignedBigInteger('clothid');
            $table->foreign('clothid')->references('id')->on('cloths')->onDelete('cascade');
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
        Schema::table('cloth_image', function (Blueprint $table) {
            $table->dropForeign('clothid');
            Schema::dropIfExists('cloth_image');


        });
    }
}
