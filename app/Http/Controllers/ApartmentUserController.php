<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentRequest;
use App\Models\City;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Repositories\ApartmentUser\ApartmentUserRepositoryInterface;

class ApartmentUserController extends Controller
{
    private ApartmentUserRepositoryInterface $repository;

    public function __construct(ApartmentUserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return view('apartment-user.apartments-list',$this->repository->getApartments());
    }

    public function create()
    {
        return view('apartment-user.add-apartment', ['cities' => City::all(), 'facilities' => Facility::all()]);
    }

    public function store(ApartmentRequest $request)
    {
        return $this->repository->addApartment($request);
    }

    public function show($id)
    {
        return view('apartment-user.bookings', $this->repository->getBookings($id));
    }
}
