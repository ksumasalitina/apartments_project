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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('building');
            $table->string('street');
            $table->string('postcode');
            $table->string('email');
            $table->string('phone');
            $table->integer('stars');
            $table->text('image_1');
            $table->text('image_2');
            $table->text('image_3');
            $table->text('description');
            $table->integer('rate');
            $table->integer('comfort');
            $table->integer('clean');
            $table->integer('staff');
            $table->integer('location');
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
        Schema::dropIfExists('apartments');
    }
};
