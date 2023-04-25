<?php

namespace App\Repositories\Booking;

use App\Http\Requests\BookingRequest;

interface BookingRepositoryInterface
{
    public function showBookingProcessInfo($room_id);
    public function addBooking(BookingRequest $request);
    public function getBookingsHistory();
}
