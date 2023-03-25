<?php

namespace App\Repositories\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;

class AuthRepository implements AuthRepositoryInterface
{

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'dob' => $request['dob'],
            'phone' => $request['phone'],
            'nationality' => $request['nationality'],
        ]);

        Auth::guard("web")->login($user);
        $request->user()->sendEmailVerificationNotification();

        return redirect(route('home'))->with('message','Вам надіслано email для підтвердження пошти');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email','password']);

        if (Auth::guard("web")->attempt($credentials)) {
            return redirect(route('home'));
        }

        return redirect(route('login'))->withErrors(['email' => "Неправильний email або пароль"]);
    }

    public function logout()
    {
        Auth::guard("web")->logout();

        return redirect()->back();
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $user = User::query()->where('email',$request['email'])->first();
        $password = uniqid();
        $user->password = Hash::make($password);
        $user->save();
        Mail::to($user->email)->send(new ResetPassword($password));
        return redirect(route('login'))->with('message','Вам надіслано email з новим паролем');
    }

    public function sendVerificationEmail(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Email для підтвердження надіслано');
    }
}
