<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Apartment;
use App\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private RoomRepositoryInterface $repository;

    public function __construct(RoomRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create($id)
    {
        return view('apartment-user.add-room', [
            'apartment' => Apartment::query()->select('id','name')->where('id',$id)->first()
        ]);
    }

    public function store(RoomRequest $request)
    {
        return $this->repository->addRoom($request);
    }
}
