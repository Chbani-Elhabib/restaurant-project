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
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id_order');
            $table->primary('id_order');
            $table->string('id_people');
            $table->foreign('id_people')->references('id_people')->on('people')->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_restaurant');
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_Livrour');
            $table->string('type_payment');
            $table->string('total');
            $table->boolean('buy')->default(0);
            $table->string('Order_serves');
            $table->boolean('active_Delivery_price')->default(1);
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
        Schema::dropIfExists('orders');
    }
};
