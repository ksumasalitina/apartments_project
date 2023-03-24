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
            $table->string('type');
            $table->string('building');
            $table->string('street');
            $table->string('postcode');
            $table->string('email');
            $table->integer('stars');
            $table->text('image_1');
            $table->text('image_2');
            $table->text('image_3');
            $table->text('description');
            $table->float('rate')->default(0);
            $table->float('comfort')->default(0);
            $table->float('clean')->default(0);
            $table->float('staff')->default(0);
            $table->float('location')->default(0);
            $table->string('latitude');
            $table->string('longitude');
            $table->string('moderation')->default('processing');
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
