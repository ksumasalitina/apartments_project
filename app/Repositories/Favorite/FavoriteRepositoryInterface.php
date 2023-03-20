<?php

namespace App\Repositories\Favorite;

interface FavoriteRepositoryInterface
{
    public function addToFavorite($id);

    public function removeFromFavorites($id);

    public function showAll();
}
