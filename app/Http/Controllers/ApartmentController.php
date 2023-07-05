<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindRequest;
use App\Models\City;
use App\Repositories\Apartment\ApartmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        if(Session::get('city')){
            return view('apartments.find', $this->apartmentRepository->filter($request));
        } else {
            return redirect(route('home'));
        }
    }

    public function show(Request $request, $id)
    {
        return view('apartments.show', $this->apartmentRepository->showApartment($request, $id));
    }

    public function search(Request $request)
    {
        return view('apartments.search', $this->apartmentRepository->search($request));
    }

    public function randomSearch()
    {
        return view('apartments.random-search', $this->apartmentRepository->random());
    }
}
