<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dish', function (Blueprint $table) {
            $table->integer('quantity');
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('dishId');
            $table->foreign('orderId')->references('id')->on('order')->onDelete('cascade');
            $table->foreign('dishId')->references('id')->on('dish')->onDelete('cascade');
            $table->primary(array('orderId', 'dishId'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_dish');
    }
};
