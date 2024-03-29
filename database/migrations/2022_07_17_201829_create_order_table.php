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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedDecimal('amount',6,2);
            $table->unsignedBigInteger('restaurantId');
            $table->unsignedBigInteger('userId');
            $table->foreign('restaurantId')->references('id')->on('restaurant')->onDelete('cascade');
            $table->foreign('userId')->references('id')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
