<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Repositories\Review\ReviewRepositoryInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    private ReviewRepositoryInterface $reviewRepository;

    public function __construct(ReviewRepositoryInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function create($id)
    {
        return view('profile.create-review',$this->reviewRepository->getApartmentInfo($id));
    }

    public function store(ReviewRequest $request)
    {
        $this->reviewRepository->addReview($request);

        return redirect(route('booking.history'))->with('message','Ваш відгук записано. Дякую!');
    }
}
