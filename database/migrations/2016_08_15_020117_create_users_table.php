<?php

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
            $table->increments('id');
            $table->integer('accountType')->unsigned();
            $table->string('name', 45);
            $table->string('username', 45)->unique();
            $table->string('password', 100);
            $table->string('firstName', 45);
            $table->string('middleInitial', 5)->nullable();
            $table->string('lastName', 45);
            $table->string('email', 80)->unique();
            $table->string('remember_token', 80);
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
        Schema::drop('users');
    }
}
