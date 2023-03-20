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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->string('id_restaurant');
            $table->primary('id_restaurant');
            $table->string('NameRestaurant');
            $table->string('Country');
            $table->string('Regions');
            $table->string('city');
            $table->text('Address');
            $table->string('id_manager');
            $table->foreign('id_manager')->references('id_people')->on('people')->onUpdate('cascade')->onDelete('cascade');
            $table->string('PriceDelivery');
            $table->string('deliverytime_of');
            $table->string('deliverytime_to');
            $table->string('NumberLike');
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
        Schema::dropIfExists('restaurants');
    }
};
