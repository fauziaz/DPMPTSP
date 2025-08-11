<?php
namespace App\Enums;

enum TipeEvent: string
{
    case Offline = 'offline';
    case Online = 'online';

    // Optional, method untuk ambil semua value
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

     public static function getOptions(): array
    {
        return [
            self::Offline->value => 'Offline',
            self::Online->value => 'Online',
        ];
    }
}
