<?php

namespace App\Repositories\Room;

use App\Http\Requests\RoomRequest;
use App\Models\Apartment;
use App\Models\Room;

class RoomRepository implements RoomRepositoryInterface
{
    public function addRoom(RoomRequest $request)
    {
        $data = $request->only([
            'apartment_id',
            'number',
            'people',
            'beds',
            'description',
            'floor',
            'cost'
        ]);

        Room::query()->create($data);

        if(filled($request->add_room)) {
            return redirect(route('room.create',$data['apartment_id']));
        } else {
            return redirect(route('my-apartments.index'));
        }
    }
}
