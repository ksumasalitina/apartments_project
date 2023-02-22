<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Country;

class AuthController
{
    private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }


    public function register(RegisterRequest $request)
    {
        return $this->authRepository->register($request);
    }

    public function login(LoginRequest $request)
    {
        return $this->authRepository->login($request);
    }

    public function logout()
    {
        return $this->authRepository->logout();
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->authRepository->resetPassword($request);
    }

    public function sendVerificationEmail(Request $request)
    {
        return $this->authRepository->sendVerificationEmail($request);
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function registerPage()
    {
        return view('auth.register',['countries' => Country::all()]);
    }

    public function resetPasswordPage()
    {
        return view('auth.reset-password');
    }
}
