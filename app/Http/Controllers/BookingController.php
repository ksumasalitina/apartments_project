<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Booking\BookingRepositoryInterface;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    private BookingRepositoryInterface $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function showBookingPage($id)
    {
        if(Auth::check() && Session::get('start_date')){
            return view('booking.booking-form', $this->bookingRepository->showBookingProcessInfo($id));
        } else if (!Auth::check()){
            return redirect(route('login'));
        } else {
            return redirect()->back();
        }
    }

    public function book(BookingRequest $request)
    {
        return $this->bookingRepository->addBooking($request);
    }

    public function bookingHistory()
    {
        return view('profile.booking-history', $this->bookingRepository->getBookingsHistory());
    }

    public function update($id, Request $request)
    {
        return $this->bookingRepository->updateBookingStatus($id, $request);
    }
}
