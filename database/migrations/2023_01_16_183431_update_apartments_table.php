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
        Schema::table('apartments', function (Blueprint $table) {
            $table->integer('rate')->default(0)->change();
            $table->integer('comfort')->default(0)->change();
            $table->integer('clean')->default(0)->change();
            $table->integer('staff')->default(0)->change();
            $table->integer('location')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartments', function (Blueprint $table) {
            $table->integer('rate')->change();
            $table->integer('comfort')->change();
            $table->integer('clean')->change();
            $table->integer('staff')->change();
            $table->integer('location')->change();
        });
    }
};
