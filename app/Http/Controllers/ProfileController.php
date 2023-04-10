<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Repositories\Profile\ProfileRepositoryInterface;

class ProfileController extends Controller
{
    private ProfileRepositoryInterface $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function show()
    {
        return $this->profileRepository->getProfileInfo();
    }

    public function update(ProfileUpdateRequest $request)
    {
        $this->profileRepository->updateProfile($request);

        return redirect()->back();
    }
}
