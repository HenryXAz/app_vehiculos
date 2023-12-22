<?php

namespace App\Http\Controllers\Auth;

use App\Dtos\Auth\LoginDTO;
use App\Exceptions\Auth\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Services\AuthService\AuthService;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ) {
    }

    public function login(AuthRequest $request): RedirectResponse
    {
        try {
            $data = json_decode(json_encode($request->only(['email', 'password', 'remember'])));
            $credentials = LoginDTO::makeLoginDTO($data);

            return $this->authService->login($credentials);
        } catch (\Throwable $th) {
            if($th instanceof AuthException) {
                return redirect(route("login"))->withErrors([
                    "error_login" => $th->getMessage(),
                ]);
            }

            if($th instanceof NotFoundHttpException )
            {
                return redirect(route("login"))->withErrors([
                    "error_login" => $th->getMessage(),
                ]);
            }

            dd($th->getMessage());
            // abort(500);
        }
    }

    public function logOut(): RedirectResponse
    {
        return $this->authService->logOut();
    }
}
