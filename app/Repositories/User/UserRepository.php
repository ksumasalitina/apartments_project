<?php

namespace App\Repositories\User;

use App\Models\City;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getUserById($id)
    {
        return ['user' => User::query()->findOrFail($id), 'cities' => City::all()];
    }

    public function getCompanions()
    {
        return ['users' => User::query()->where('is_companion',1)->get(), 'cities' => City::all()];
    }
}
