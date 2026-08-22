<?php

namespace App\Enums;

enum CustomerStatus: string
{
    case New = 'new';
    case Interested = 'interested';
    case Customer = 'customer';
    case Inactive = 'inactive';

    public function label(): string
    {
        return match ($this) {
            self::New => 'New',
            self::Interested => 'Interested',
            self::Customer => 'Customer',
            self::Inactive => 'Inactive',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::New => 'bg-blue-100 text-blue-700',
            self::Interested => 'bg-amber-100 text-amber-700',
            self::Customer => 'bg-green-100 text-green-700',
            self::Inactive => 'bg-gray-100 text-gray-500',
        };
    }
}
