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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('apartment_id')->references('id')->on('apartments')
                ->onDelete('cascade');
            $table->string('title');
            $table->text('comment');
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
        Schema::dropIfExists('reviews');
    }
};
