<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    private FavoriteRepositoryInterface $favoriteRepository;

    public function __construct(FavoriteRepositoryInterface $favoriteRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function add($id)
    {
        $message = $this->favoriteRepository->addToFavorite($id);

        return redirect()->back()->with('message', $message);
    }

    public function remove($id)
    {
        $message = $this->favoriteRepository->removeFromFavorites($id);

        return redirect()->back()->with('message', $message);
    }

    public function showAll()
    {
        return view('favorites.favorites-list', $this->favoriteRepository->showAll());
    }
}
