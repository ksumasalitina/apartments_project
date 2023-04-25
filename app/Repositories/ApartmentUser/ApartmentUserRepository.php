<?php

namespace App\Repositories\ApartmentUser;

use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentUserRepository implements ApartmentUserRepositoryInterface
{
    public function getApartments()
    {
        $apartments = Auth::user()->apartments;
        foreach ($apartments as $apartment) {
            $bookings = $apartment->bookings;
            $apartment->books = count($bookings);
        }

        return ['apartments' => $apartments];
    }

    public function addApartment(ApartmentRequest $request)
    {
        $data = $request->only([
            'name',
            'type',
            'city_id',
            'building',
            'street',
            'postcode',
            'email',
            'stars',
            'description',
            'latitude',
            'longitude'
        ]);

        $fileName = time().'.'.$request['image_1']->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('apartments', $request['image_1'],$fileName);
        $data['image_1'] = $fileName;

        $fileName = time().'.'.$request['image_2']->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('apartments', $request['image_2'],$fileName);
        $data['image_2'] = $fileName;

        $fileName = time().'.'.$request['image_3']->getClientOriginalExtension();
        Storage::disk('public')->putFileAs('apartments', $request['image_3'],$fileName);
        $data['image_3'] = $fileName;

        $apartment = Apartment::query()->create($data);

        foreach (explode(',',$request->facilities) as $facility) {
            $apartment->facilities()->attach($facility);
        }

        $apartment->users()->attach(Auth::id());

        dd($apartment);
    }

    public function getBookings($id)
    {
        // TODO: Implement getBookings() method.
    }
}
