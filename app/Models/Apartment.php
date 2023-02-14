<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'city_id',
        'building', 'street',
        'postcode', 'email',
        'phone', 'stars',
        'image_1', 'image_2', 'image_3',
        'description',
        'rate', 'comfort', 'clean', 'staff', 'location'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites',
            'apartment_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function scopeFindApartments($query, $rooms, $city, $people)
    {
        return $query
            ->select(DB::raw('apartments.*, min(rooms.cost) as price'))
            ->join('rooms', 'rooms.apartment_id', '=', 'apartments.id')
            ->where('apartments.city_id',$city)
            ->where('rooms.people','>=',$people)
            ->whereNotIn('rooms.id', $rooms)
            ->groupBy('apartments.id');
    }

    public function scopeBestApartments($query)
    {
        return $query
            //->select(DB::raw('apartments.*, count(*) as count'))
            //->join('reviews', 'apartment_id', '=', 'apartments.id')
            ->where('apartments.rate','>', 5);
            //->groupBy('apartments.id')
            //->orderByDesc('count');
    }
}
