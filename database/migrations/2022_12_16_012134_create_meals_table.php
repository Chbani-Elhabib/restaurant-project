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
        Schema::create('meals', function (Blueprint $table) {
            $table->string('id_meal');
            $table->primary('id_meal');
            $table->string('NameFood');
            $table->text('Description');
            $table->string('Price');
            $table->string('TypeFood');
            $table->string('Photo');
            $table->string('NumberLike');
            $table->boolean('bestMeals')->default(0);
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
        Schema::dropIfExists('meals');
    }
};
