<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClothCategoryPropertyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloth_category_property_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_property_data_id');
            $table->unsignedBigInteger('cloth_id');
            $table->foreign('category_property_data_id')->references('id')->on('category_property_data')->onDelete('cascade');
            $table->foreign('cloth_id')->references('id')->on('cloths')->onDelete('cascade');

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
        Schema::dropIfExists('cloth_category_property_data');
    }
}
