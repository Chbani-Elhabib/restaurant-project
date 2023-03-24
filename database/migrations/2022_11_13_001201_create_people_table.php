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
        Schema::create('people', function (Blueprint $table) {
            $table->string('id_people');
            $table->primary('id_people');
            $table->string('FullName');
            $table->string('UserName')->unique();
            $table->string('Email');
            $table->boolean('Verif_Email')->default(0);
            $table->string('Password');
            $table->string('User_Group');
            $table->string('Telf');
            $table->boolean('Verif_Telf')->default(0);
            $table->string('Photo');
            $table->string('Country');
            $table->string('Regions');
            $table->string('city');
            $table->text('Address');
            $table->boolean('customer')->default(0);
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
        Schema::dropIfExists('people');
    }
};
