<?php

namespace App\Models;

use App\Data\BookingStatuses;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property integer $user_id
 * @property integer $apartment_id
 * @property integer $room_id
 * @property string $checkin_at
 * @property string $checkout_at
 * @property integer $people_amount
 * @property integer $total
 * @property BookingStatuses $status
 * @property string $guest_first_name
 * @property string $guest_last_name
 * @property string $guest_email
 * @property string $message
 */
class Booking extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    protected $casts = [
        'status' => BookingStatuses::class
    ];
}
