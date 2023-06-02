<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getUserById($id);

    public function getCompanions();
}
