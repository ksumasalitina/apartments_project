<?php

namespace App\Repositories\Profile;
use App\Http\Requests\ProfileUpdateRequest;

interface ProfileRepositoryInterface
{
    public function getProfileInfo();
    public function updateProfile(ProfileUpdateRequest $request);

}
