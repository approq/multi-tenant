<?php

namespace App\Enums;

enum Pronoun: string
{
    case HE = 'he';
    case SHE = 'she';

    public function displayName(): string
    {
        return match ($this) {
            static::HE => 'he/him',
            static::SHE => 'she/her',
        };
    }
}
