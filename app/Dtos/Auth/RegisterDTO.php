<?php

namespace App\Dtos\Auth;

class RegisterDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly string $role,
        public readonly string $status,
    )
    {}

    public static function makeRegisterDTO(mixed $data)
    {   
        return new RegisterDTO(
            name: $data->name, 
            email: $data->email,
            password: $data->password,
            role: $data->role,
            status: $data->status,
        );
    }
}