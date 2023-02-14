<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindRequest;
use App\Repositories\Apartment\ApartmentRepositoryInterface;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    private ApartmentRepositoryInterface $apartmentRepository;

    public function __construct(ApartmentRepositoryInterface $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function index()
    {
        return view('apartments.home', $this->apartmentRepository->bestApartments());
    }

    public function find(FindRequest $request)
    {
        return view('apartments.find', $this->apartmentRepository->findApartments($request));
    }

    public function filter(Request $request)
    {
        return view('apartments.find', $this->apartmentRepository->filter($request));
    }
}
