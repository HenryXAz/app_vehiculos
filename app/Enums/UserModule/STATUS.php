<?php

namespace App\Enums\UserModule;

enum STATUS {
    case ENABLED;
    case DISABLED;

    public function value()
    {
        return match($this) {
            self::ENABLED => 'Activo',
            self::DISABLED => 'Desactivado'
        };
    }

    public function dbValue()
    {
        return match($this) {
            self::ENABLED => 'enabled',
            self::DISABLED => 'disabled',
        };
    }

    public function isEnabled()
    {
        return match($this) {
            self::ENABLED => true,
            self::DISABLED => false
        };
    }
}