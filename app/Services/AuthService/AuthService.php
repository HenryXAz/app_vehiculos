<?php

namespace App\Services\AuthService;

use App\Dtos\Auth\LoginDTO;
use App\Dtos\Auth\RegisterDTO;
use App\Exceptions\Auth\AuthException;
use App\Models\User;
use App\Services\UserModule\UserModuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private readonly UserModuleService $userModuleService
    )
    {}

    public function login(LoginDTO $userCredentials): RedirectResponse
    {
        $credentials = [
            "email" => $userCredentials->email,
            "password" => $userCredentials->password,
        ];

        $user = $this->userModuleService->findByEmail($userCredentials->email);

        if($user->status === \App\Enums\UserModule\STATUS::DISABLED) {
            throw new AuthException("user does not exists or credentials are invalid", Response::HTTP_UNAUTHORIZED);
        }

        if(Auth::attempt($credentials, $userCredentials->remember)) {
            request()->session()->regenerate();
        
            return redirect(route('dashboard'));
        }
        throw new AuthException('user does not exists or credentials are invalid', Response::HTTP_UNAUTHORIZED);
    }

    public function register(RegisterDTO $registerDTO): bool
    {
        $user = new User();
        $user->name = $registerDTO->name;
        $user->email = $registerDTO->email;
        $user->password = Hash::make($registerDTO->password);
        $user->role = $registerDTO->role;
        $user->status = $registerDTO->status;
        return $user->save();
    }


    public function logOut(): RedirectResponse 
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect(route('login'));
    }
}