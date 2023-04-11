<?php

namespace App\Repositories\Apartment;

use App\Models\Apartment;
use App\Models\Booking;
use App\Models\City;
use App\Http\Requests\FindRequest;
use App\Models\Room;
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
        $start = new \DateTime($request['startDate']);
        $end = new \DateTime($request['endDate']);
        $diff = $start->diff($end);

        $rooms = Booking::query()->findBookedRooms($request['startDate'],$request['endDate'])->get();
        $result = Apartment::query()->findApartments($rooms,$request['city'],$request['people'],$diff->days)->get();
        $cities = City::all();
        $city = City::query()->find($request['city']);

        return ['apartments'=>$result, 'cities'=>$cities, 'city'=>$city];
    }

    public function filter(Request $request)
    {
        $rooms = Booking::query()->findBookedRooms(Session::get('start_date'), Session::get('end_date'))->get();
        $result = Apartment::query()->findApartments($rooms, Session::get('city'), Session::get('people'));
        $cities = City::all();
        $city = City::query()->find(Session::get('city'));

        if(filled($request['reset'])) {
            $request['price'] = null;
            $request['rate'] = null;
            $request['stars'] = null;
            $request['sort'] = null;
        }

        if(filled($request['price'])) {
            $result = $result->filterByPrice(explode(',',$request['price']));
        }
        if(filled($request['rate'])) {
            $result = $result->filterByRate($request['rate']);
        }
        if(filled($request['stars'])) {
            $result = $result->filterByStars($request['stars']);
        }
        if(filled($request['sort'])) {
            $result = $result->sortBy($request['sort']);
        }

        return ['apartments' => $result->get(), 'cities' => $cities, 'city' => $city];
    }

    public function showApartment(Request $request, $id)
    {
        if(filled($request['startDate']) && filled($request['endDate'])){
            Session::put('start_date', $request['startDate']);
            Session::put('end_date', $request['endDate']);
        }

        $apartment = Apartment::query()->findOrFail($id);
        $cities = City::all();

        $rooms = null;

        if(Session::get('start_date')){
            $bookedRooms = Booking::query()->findBookedRooms(Session::get('start_date'), Session::get('end_date'))->get();
            $rooms = Room::query()->findAvailableRooms($id, $bookedRooms)->get();
        }

        return ['apartment' => $apartment, 'cities' => $cities, 'rooms' => $rooms];
    }
}
