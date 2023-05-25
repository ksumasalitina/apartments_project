<?php

namespace App\Repositories\Review;

use App\Http\Requests\ReviewRequest;
use App\Models\Apartment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewRepository implements ReviewRepositoryInterface
{

    public function getApartmentInfo($id)
    {
        return ['apartment' => Apartment::query()->findOrFail($id)];
    }

    public function addReview(ReviewRequest $request)
    {
        $data = $request->only([
            'title',
            'comment',
            'rate',
            'clean',
            'staff',
            'comfort',
            'location',
            'apartment_id'
        ]);

        $data['user_id'] = Auth::id();

        Review::query()->create($data);
    }
}
