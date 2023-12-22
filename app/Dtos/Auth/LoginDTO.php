<?php

namespace App\Dtos\Auth;

class LoginDTO
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly bool $remember = false,
    )
    {}

    public static function makeLoginDTO(mixed $data)
    {
        return new LoginDTO(
            email: $data->email,
            password: $data->password,
            remember: (isset($data->remember) ? $data->remember : false),
        );
    }
}