<?php

namespace App\Services\AuthService;

use App\Exceptions\Auth\AuthException;
use App\Entities\Auth\UserCredentials;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(UserCredentials $userCredentials): RedirectResponse
    {
        $credentials = [
            "email" => $userCredentials->email,
            "password" => $userCredentials->password,
        ];

        if(Auth::attempt($credentials, $userCredentials->remember)) {
            request()->session()->regenerate();
        
            return redirect(route('dashboard'));
        }
        throw new AuthException('user does not exists or credentials are invalid', Response::HTTP_UNAUTHORIZED);
    }

    public function logOut(): RedirectResponse 
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect(route('login'));
    }
}