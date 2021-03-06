<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->increments('idProductStock');
            $table->integer('idProduct')->unsigned();
            /*
            $table->foreign('idProduct')
                  ->references('idProduct')->on('products')
                  ->onDelete('cascade');
            */
            $table->integer('size')->unsigned();
            $table->integer('stock')->unsigned();
            $table->softDeletes();
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
        Schema::drop('product_stock');
    }
}
