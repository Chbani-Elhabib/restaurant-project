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
            $table->unsignedBigInteger('id')->primary();
            $table->string('NameRestaurant');
            $table->string('Country');
            $table->string('Regions');
            $table->string('city');
            $table->text('Address');
            $table->foreignId('id_manager')->constrained('people')->onUpdate('cascade')->onDelete('cascade');
            $table->string('PriceDelivery');
            $table->string('deliverytime_of');
            $table->string('deliverytime_to');
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
