<?php

namespace App\Repositories\Apartment;

use App\Models\Apartment;
use App\Models\Booking;
use App\Models\City;
use App\Http\Requests\FindRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApartmentRepository implements ApartmentRepositoryInterface
{

    public function bestApartments()
    {
        $apartments = Apartment::query()->bestApartments()->get();
        $cities = City::all();

        return ['apartments'=>$apartments, 'cities'=>$cities];
    }

    public function findApartments(FindRequest $request)
    {
        Session::put('city', $request['city']);
        Session::put('start_date', $request['startDate']);
        Session::put('end_date', $request['endDate']);
        Session::put('people', $request['people']);

        $rooms = Booking::query()->findBookedRooms($request['startDate'],$request['endDate'])->get();
        $result = Apartment::query()->findApartments($rooms,$request['city'],$request['people'])->get();
        $cities = City::all();
        $city = City::query()->find($request['city']);

        return ['apartments'=>$result, 'cities'=>$cities, 'city'=>$city];
    }

    public function filter(Request $request)
    {
        dd($request);
    }

    public function showApartment($id)
{
    // TODO: Implement showApartment() method.
}
}
