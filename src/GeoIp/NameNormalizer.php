<?php

namespace Gupalo\GeoIp;

class NameNormalizer
{
    private const TRANSLATIONS = [
        'ë' => 'e', // strange utf-8 "ë", not russian "yo"
    ];

    private static ?array $keys = null;

    private static ?array $values = null;

    public static function normalize(?string $s): ?string
    {
        if ($s === null) {
            return null;
        }

        if (self::$keys === null) {
            self::$keys = array_keys(self::TRANSLATIONS);
            self::$values = array_values(self::TRANSLATIONS);
        }

        return str_replace(self::$keys, self::$values, $s);
    }
}
