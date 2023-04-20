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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('guest_firstname');
            $table->string('guest_lastname');
            $table->string('guest_email');
            $table->string('notice')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('guest_firstname');
            $table->dropColumn('guest_lastname');
            $table->dropColumn('guest_email');
            $table->dropColumn('notice');
        });
    }
};
