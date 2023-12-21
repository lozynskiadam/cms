<?php

namespace App\Enums;

enum FileRelation: string
{
    case AVATAR = 'avatar';
    case MAIN_IMAGE = 'main-image';

    public function getLabel(): ?string
    {
        return match ($this) {
            FileRelation::AVATAR => 'Avatar',
            default => str_replace('-', ' ', $this->name)
        };
    }

    public function getLimit(): ?int
    {
        return match ($this) {
            FileRelation::AVATAR => 1,
            default => null
        };
    }
}
