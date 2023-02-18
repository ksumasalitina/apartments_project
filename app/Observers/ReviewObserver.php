<?php

namespace App\Observers;

use App\Models\Apartment;
use App\Models\Review;

class ReviewObserver
{
    /**
     * Handle the Review "created" event.
     *
     * @param \App\Models\Review $review
     * @return void
     */
    public function created(Review $review)
    {
        $apartment = Apartment::query()->findOrFail($review->apartment_id);

        $rate = ($apartment->rate + $review->rate) / 2;
        $comfort = ($apartment->comfort + $review->comfort) / 2;
        $clean = ($apartment->clean + $review->clean) / 2;
        $staff = ($apartment->staff + $review->staff) / 2;
        $location = ($apartment->location + $review->location) / 2;

        Apartment::query()->where('id', $apartment->id)->update([
            'rate' => $rate,
            'comfort' => $comfort,
            'clean' => $clean,
            'staff' => $staff,
            'location' => $location
        ]);
    }

    /**
     * Handle the Review "deleted" event.
     *
     * @param \App\Models\Review $review
     * @return void
     */
    public function deleting(Review $review)
    {
        $apartment = Apartment::query()->findOrFail($review->apartment_id);

        $rate = $apartment->rate * 2 - $review->rate;
        $comfort = $apartment->comfort * 2 - $review->comfort;
        $clean = $apartment->clean * 2 - $review->clean;
        $staff = $apartment->staff * 2 - $review->staff;
        $location = $apartment->location * 2 - $review->location;

        Apartment::query()->where('id', $apartment->id)->update([
            'rate' => $rate,
            'comfort' => $comfort,
            'clean' => $clean,
            'staff' => $staff,
            'location' => $location
        ]);
    }
}
