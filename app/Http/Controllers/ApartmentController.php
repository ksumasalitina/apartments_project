<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindRequest;
use App\Http\Resources\Apartment\IndexResource;
use App\Http\Resources\CityResource;
use App\Models\Apartment;
use App\Models\City;
use App\Repositories\Apartment\ApartmentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class ApartmentController extends Controller
{
    private ApartmentRepositoryInterface $apartmentRepository;
    public function __construct(ApartmentRepositoryInterface $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function index(Request $request)
    {
        $request->validate([
            'city' => ['nullable', 'integer', 'exists:cities,id']
        ]);

        return Inertia::render('Home', [
            'cities' => CityResource::collection(City::query()->orderBy('name')->get())->resolve(),
            'apartments' => IndexResource::collection(Apartment::bestProposals($request->city)->get())->resolve(),
            'currentCityId' => (int)$request->city
        ]);
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
