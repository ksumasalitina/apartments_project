<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'apartment_id', 'room_id',
        'guest_firstname', 'guest_lastname', 'guest_email',
        'check_in', 'check_out',
        'people', 'total', 'status', 'notice'
    ];

    protected $casts = [
        'check_in' => 'datetime',
        'check_out' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Scope a queries.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeFindBookedRooms($query, $start_date, $end_date)
    {
        return $query->select('room_id')
            ->where('check_in','<=',date('Y-m-d', strtotime($end_date)))
            ->where('check_out','>=',date('Y-m-d', strtotime($start_date)));
    }

    public function scopeCheckAvailability($query, $room_id, $start_date, $end_date)
    {
        return $query->select('id')
            ->where('check_out', '>=', date('Y-m-d', strtotime($start_date)))
            ->where('check_in', '<=', date('Y-m-d', strtotime($end_date)))
            ->where('room_id', $room_id);
    }
}

