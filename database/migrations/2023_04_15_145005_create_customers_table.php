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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id_people');
            $table->foreign('id_people')->references('id_people')->on('people')->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_restaurant');
            $table->foreign('id_restaurant')->references('id_restaurant')->on('restaurants')->onUpdate('cascade')->onDelete('cascade');
            $table->string('star');
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
        Schema::dropIfExists('customers');
    }
};
