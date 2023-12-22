<?php

namespace App\Entities\UserModule;

use App\Dtos\UserModule\UserDto;

class User {
    public function __construct(
        public  readonly  int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $role,
        public readonly string $status,
    )
    {}

    public static function toEntity(UserDto $userDto)
    {
        return new User(
            id: $userDto->id,
            name: $userDto->name,
            email: $userDto->email,
            role: $userDto->role->numberValue(),
            status: $userDto->status->dbValue()
        );
    }

    public static function makeUser(mixed $data) 
    {
        return new User(
            id: $data->id,
            name: $data->name,
            email: $data->email,
            role: $data->role,
            status: $data->status,
        );
    }
}