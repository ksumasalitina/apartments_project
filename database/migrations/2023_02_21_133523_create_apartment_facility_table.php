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
        Schema::create('apartment_facility', function (Blueprint $table) {
            $table->foreignId('apartment_id')->references('id')->on('apartments')
                ->onDelete('cascade');
            $table->foreignId('facility_id')->references('id')->on('facilities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_facility');
    }
};
