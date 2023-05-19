<?php

namespace App\Repositories\Room;

use App\Http\Requests\RoomRequest;

interface RoomRepositoryInterface
{
    public function addRoom(RoomRequest $request);
}
