<?php
namespace App\Enums;

enum SifatAcara: string
{
    case Terbuka = 'terbuka';
    case Tertutup = 'tertutup';

    // Optional, method untuk ambil semua value
    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

     public static function getOptions(): array
    {
        return [
            self::Terbuka->value => 'Terbuka',
            self::Tertutup->value => 'Tertutup',
        ];
    }
}