<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('idAccount');
            $table->integer('accountType')->unsigned();
            $table->string('username', 45)->unique();
            $table->string('password', 100);
            $table->string('firstName', 45);
            $table->string('middleInitial', 5)->nullable();
            $table->string('lastName', 45);
            $table->string('emailAddress', 80)->unique();
            $table->string('remember_token', 80);
            /* for the email confirmation upon registration */
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();

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
        Schema::drop('accounts');
    }
}
