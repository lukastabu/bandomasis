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
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->unsignedBigInteger('restaurant_id');   
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->unsignedDecimal('price', $precision = 8, $scale = 2);
            $table->unsignedDecimal('rating', $precision = 3, $scale = 2);
            $table->string('photo', 254);
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
        Schema::dropIfExists('food');
    }
};
