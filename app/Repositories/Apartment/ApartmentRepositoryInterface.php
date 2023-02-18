<?php

namespace App\Repositories\Apartment;

use Illuminate\Http\Request;
use App\Http\Requests\FindRequest;

interface ApartmentRepositoryInterface
{
    public function bestApartments();
    public function findApartments(FindRequest $request);
    public function showApartment(Request $request, $id);
    public function filter(Request $request);
}
