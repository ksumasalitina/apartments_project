<?php

namespace App\Repositories\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function register(RegisterRequest $request);
    public function login(LoginRequest $request);
    public function logout();
    public function resetPassword(ResetPasswordRequest $request);
    public function sendVerificationEmail(Request $request);
}
