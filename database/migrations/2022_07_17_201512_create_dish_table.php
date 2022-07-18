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
        Schema::create('dish', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('photo');
            $table->mediumText('description');
            $table->double('price', 5, 2);
            $table->unsignedBigInteger('restaurantId');
            $table->foreign('restaurantId')->references('id')->on('restaurant');
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
        Schema::dropIfExists('dish');
    }
};
