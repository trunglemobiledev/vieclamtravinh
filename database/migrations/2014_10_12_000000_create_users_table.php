<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->string('phone',15)->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('diaChi', 191)->nullable();
            $table->string('cccd', 191)->nullable();
            $table->string('sex', 191)->nullable();
            $table->string('mst', 191)->nullable();
            $table->string('googleAccount', 191)->nullable();
            $table->string('facebookAccount', 191)->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('votes')->nullable();
            $table->string('password');
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
