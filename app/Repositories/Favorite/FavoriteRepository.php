<?php

namespace App\Repositories\Favorite;

use App\Models\Apartment;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class FavoriteRepository implements FavoriteRepositoryInterface
{

    public function addToFavorite($id)
    {
        $user = Auth::user();
        $user->favorites()->attach($id);

        return 'Помешкання додано у вподобання';
    }

    public function removeFromFavorites($id)
    {
        $user = Auth::user();
        $user->favorites()->detach($id);

        return 'Помешкання видалено з вподобань';
    }

    public function showAll()
    {
        return ['apartments' =>  Auth::user()->favorites, 'cities' => City::all()];
    }
}
