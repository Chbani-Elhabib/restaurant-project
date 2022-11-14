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
            $table->id();
            $table->string('UserName')->unique();
            $table->string('Password');
            $table->string('Email')->unique();
            $table->boolean('Verifid-Email')->default(0);
            $table->integer('User-Group')->default(0);
            $table->string('Telf')->unique();
            $table->boolean('Verifid-Telf')->default(0);
            $table->string('Photo');
            $table->timestamp('create-date');
            $table->timestamp('updated-date');
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
