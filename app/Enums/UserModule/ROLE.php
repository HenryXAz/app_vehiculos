<?php

namespace App\Enums\UserModule;

enum ROLE
{
    case SELLER;
    case SECRETARY;

    public function value()
    {
        return match($this) {
            self::SELLER => 'Vendedor/a',
            self::SECRETARY => 'Secretario/a'
        };
    }

    public function numberValue()
    {
        return match($this) {
            self::SELLER => 2,
            self::SECRETARY => 3,
        };
    }
}