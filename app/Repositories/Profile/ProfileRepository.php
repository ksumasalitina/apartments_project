<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileRepository implements ProfileRepositoryInterface
{

    public function getProfileInfo()
    {
        $countries = Country::all();

        if(Auth::check()) {
            return view('profile.profile-info', ['user' => Auth::user(), 'countries' => $countries]);
        } else {
            return redirect(route('login'));
        }
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'dob',
            'nationality',
            'phone'
        ]);

        if($request['email'] != null){
            $data['email'] = $request['email'];
        }

        return User::query()->where('id', Auth::id())->update($data);
    }
}
