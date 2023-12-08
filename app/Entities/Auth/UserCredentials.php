<?php

namespace App\Entities\Auth;

class UserCredentials
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
        public readonly bool $remember = false,
    )
    {}
}