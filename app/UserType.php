<?php

namespace App;

enum UserType: int {
    case ADMIN = 1;
    case DEFAULT = 2;

    public function label (): string {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::DEFAULT => 'Default User',
        };
    }
}
