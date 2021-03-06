<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->string('mobile')->unique();
            $table->string('platform')->nullable(true);
            $table->date('birthday')->nullable(true);
            $table->text('address')->nullable(true);
            $table->boolean('gender')->nullable(false);
            $table->tinyInteger('status')->nullable(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
