<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser($id)
    {
        return view('users.show-user', $this->userRepository->getUserById($id));
    }

    public function showCompanions()
    {
        return view('users.companions', $this->userRepository->getCompanions());
    }
}
