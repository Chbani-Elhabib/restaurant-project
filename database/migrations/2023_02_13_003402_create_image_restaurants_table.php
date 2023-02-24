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
        Schema::create('image_restaurants', function (Blueprint $table) {
            $table->string('id_restaurant');
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Photo');
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
        Schema::dropIfExists('image_restaurants');
    }
};
