<?php

namespace App\Repositories\Booking;

use App\Http\Requests\BookingRequest;
use Illuminate\Http\Request;

interface BookingRepositoryInterface
{
    public function showBookingProcessInfo($room_id);
    public function addBooking(BookingRequest $request);
    public function getBookingsHistory();
    public function updateBookingStatus($id, Request $request);
}
