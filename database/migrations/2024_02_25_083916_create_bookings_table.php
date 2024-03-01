<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->foreignIdFor(\App\Models\Apartment::class)->constrained();
            $table->foreignIdFor(\App\Models\Room::class)->constrained();
            $table->date('checkin_at');
            $table->date('checkout_at');
            $table->unsignedTinyInteger('people_amount');
            $table->unsignedInteger('total');
            $table->unsignedTinyInteger('status')->default(\App\Data\BookingStatuses::WAITING_FOR_APPROVE->value);
            $table->string('guest_first_name');
            $table->string('guest_last_name');
            $table->string('guest_email');
            $table->text('message')->nullable();
            $table->boolean('is_feedbacked')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
