<?php

namespace App\Enums;

enum ConversationStatus: string
{
    case Open = 'open';
    case Closed = 'closed';

    public function label(): string
    {
        return match ($this) {
            self::Open => 'Open',
            self::Closed => 'Closed',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::Open => 'bg-green-100 text-green-700',
            self::Closed => 'bg-gray-100 text-gray-500',
        };
    }
}
