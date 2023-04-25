<?php

namespace App\Repositories\ApartmentUser;

use App\Http\Requests\ApartmentRequest;
use Illuminate\Http\Request;

interface ApartmentUserRepositoryInterface
{
    public function getApartments();
    public function addApartment(ApartmentRequest $request);
    public function getBookings($id);
}
