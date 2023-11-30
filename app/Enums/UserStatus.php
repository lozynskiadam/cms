<?php

namespace App\Enums;

enum UserStatus: int
{
    case INACTIVE = 0;
    case ACTIVE = 1;
    case BLOCKED = 2;

    public static function map(): array
    {
        return [
            UserStatus::INACTIVE->value => 'Nieaktywny',
            UserStatus::ACTIVE->value => 'Aktywny',
            UserStatus::BLOCKED->value => 'Zablokowany',
        ];
    }

    public function label(): string
    {
        return UserStatus::map()[$this->value];
    }

    public function render(): string
    {
        return match ($this) {
            UserStatus::ACTIVE => "<span class='badge bg-success'>" . $this->label() . "</span>",
            UserStatus::INACTIVE => "<span class='badge bg-danger'>" . $this->label() . "</span>",
            UserStatus::BLOCKED => "<span class='badge bg-black'>" . $this->label() . "</span>",
        };
    }
}
