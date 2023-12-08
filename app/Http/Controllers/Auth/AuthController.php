<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Auth\UserCredentials;
use App\Exceptions\Auth\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Services\AuthService\AuthService;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {
    }

    public function login(AuthRequest $request): RedirectResponse
    {
        try {
            $credentials = new UserCredentials(
                email: $request->email,
                password: $request->password,
                remember: ($request->has('remember') ? $request->remember : false),
            );

            return $this->authService->login($credentials);
        } catch (AuthException $th) {
            if($th instanceof AuthException) {
                return redirect(route("login"))->withErrors([
                    "error_login" => $th->getMessage(),
                ]);
            }

            return redirect("login")->withErrors([
                "error_login" => "500 internal server error"
            ]);
        }
    }

    public function logOut(): RedirectResponse
    {
        return $this->authService->logOut();
    }
}
