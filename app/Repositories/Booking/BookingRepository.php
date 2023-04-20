<?php

namespace App\Repositories\Booking;

use App\Http\Requests\BookingRequest;
use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Room;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BookingRepository implements BookingRepositoryInterface
{
    public function showBookingProcessInfo($room_id)
    {
        $room = Room::query()->findOrFail($room_id);

        return [
            'user' => Auth::user(),
            'room' => $room,
            'apartment' => Apartment::query()->findOrFail($room->apartment_id),
            'total' => number_format($room->cost * Session::get('days'), 2)
        ];
    }

    public function addBooking(BookingRequest $request)
    {
        if (Auth::check() && Session::get('start_date')) {
            $is_booked = Booking::query()->checkAvailability($request->room_id, Session::get('start_date'), Session::get('end_date'))->get();

            if(!filled($is_booked)) {
                Booking::query()->create([
                    'user_id' => Auth::id(),
                    'apartment_id' => $request->apartment_id,
                    'room_id' => $request->room_id,
                    'check_in' => Session::get('start_date'),
                    'check_out' => Session::get('end_date'),
                    'people' => $request->people,
                    'total' => floatval($request->total),
                    'guest_firstname' => $request->guest_firstname,
                    'guest_lastname' => $request->guest_lastname,
                    'guest_email' => $request->guest_email,
                    'notice' => $request->notice
                ]);
                return view('booking.booking-success');
            } else {
                return redirect(route('show', $request->apartment_id))->with('message', 'Нажаль, кімната вже зайнята. Оберіть інший варіант');
            }

        } else if (!Auth::check()){
            return redirect(route('login'));
        } else {
            return redirect(route('show', $request->apartment_id));
        }
    }
}
