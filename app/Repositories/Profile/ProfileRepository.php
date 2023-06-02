<?php

namespace App\Repositories\Profile;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
            'phone',
            'message'
        ]);

        if(filled($request->is_companion)) {
            $data['is_companion'] = 1;
        } else {
            $data['is_companion'] = 0;
        }

        if($request['email'] != null){
            $data['email'] = $request['email'];
        }

        if(filled($request['avatar'])){
            if(isset(Auth::user()->avatar)){
                Storage::delete('avatars/' . Auth::user()->avatar);
            }
            $fileName = time().'.'.$request['avatar']->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('avatars', $request['avatar'],$fileName);
            $data['avatar'] = $fileName;
        }


        return User::query()->where('id', Auth::id())->update($data);
    }
}
