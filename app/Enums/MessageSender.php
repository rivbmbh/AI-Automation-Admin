<?php

namespace App\Enums;

enum MessageSender: string
{
    case Customer = 'customer';
    case Admin = 'admin';
    case Ai = 'ai';

    public function label(): string
    {
        return match ($this) {
            self::Customer => 'Customer',
            self::Admin => 'Admin',
            self::Ai => 'AI',
        };
    }

    public function alignment(): string
    {
        return $this === self::Customer ? 'left' : 'right';
    }
}
