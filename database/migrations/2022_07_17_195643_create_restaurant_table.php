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
        if(!Schema::hasTable('restaurant')){
            Schema::create('restaurant', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->string('address', 255);
                $table->double('latitude', 20, 18);
                $table->double('longitude', 20, 18);
                $table->double('rating', 2, 1);
                $table->string('photo', 255);
                $table->mediumText('description');
                $table->unsignedBigInteger('categoryId');
                $table->foreign('categoryId')->references('id')->on('category');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant');
    }
};
