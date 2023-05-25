<?php

namespace App\Repositories\Review;

use App\Http\Requests\ReviewRequest;

interface ReviewRepositoryInterface
{
    public function getApartmentInfo($id);
    public function addReview(ReviewRequest $request);
}
