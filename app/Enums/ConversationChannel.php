<?php

namespace App\Enums;

enum ConversationChannel: string
{
    case Shopee = 'shopee';
    case TikTok = 'tiktok';
    case WhatsApp = 'whatsapp';
    case Website = 'website';

    public function label(): string
    {
        return match ($this) {
            self::Shopee => 'Shopee',
            self::TikTok => 'TikTok Shop',
            self::WhatsApp => 'WhatsApp',
            self::Website => 'Website',
        };
    }

    public function badgeColor(): string
    {
        return match ($this) {
            self::Shopee => 'bg-orange-100 text-orange-700',
            self::TikTok => 'bg-slate-200 text-slate-800',
            self::WhatsApp => 'bg-emerald-100 text-emerald-700',
            self::Website => 'bg-indigo-100 text-indigo-700',
        };
    }
}
