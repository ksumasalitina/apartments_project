<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'people', 'number', 'floor',
        'cost', 'description', 'beds'
    ];

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
