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
            $table->string('UserName')->unique();
            $table->string('Password');
            $table->string('Email');
            $table->boolean('Verifid_Email')->default(0);
            $table->integer('User_Group')->default(0);
            $table->string('Telf');
            $table->boolean('Verifid_Telf')->default(0);
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
        Schema::dropIfExists('people');
    }
};
