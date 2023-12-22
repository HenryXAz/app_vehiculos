<?php

namespace App\Dtos\UserModule;

use App\Entities\UserModule\User;
use App\Enums\UserModule\ROLE;
use App\Enums\UserModule\STATUS;

class UserDto
{
    private  const USER_ROLES = [
        '1' => ROLE::SELLER,
        '2' => ROLE::SELLER,
        '3' => ROLE::SECRETARY
    ];

    private  const USER_STATUS = [
        'enabled' => STATUS::ENABLED,
        'disabled' => STATUS::DISABLED,
    ];

    public  function __construct(
        public  readonly  ?int $id,
        public  readonly string $name,
        public  readonly string $email,
        public readonly ROLE $role,
        public readonly STATUS $status,
    ) {
    }

    public  static function  makeDTO(mixed $data, int $id = 0)
    {
        return new UserDto(
            id: $id,
            name: $data->name,
            email: $data->email,
            role: self::USER_ROLES[$data->role],
            status: self::USER_STATUS[$data->status],
        );
    }

    public  static function toEntity(UserDto $user): User
    {
        return new User(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            role: $user->role->numberValue(),
            status: $user->status->dbValue(),
        );
    }

    public  static function toDTO(User $user): UserDto
    {
        return new UserDto(
            id: $user->id,
            name: $user->name,
            email: $user->email,
            role: self::USER_ROLES[$user->role],
            status: self::USER_STATUS[$user->status],
        );
    }
}
