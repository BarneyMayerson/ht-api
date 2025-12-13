<?php

declare(strict_types=1);

namespace App\Models;

enum Status: string
{
    case Active = 'A';
    case Complete = 'C';
    case Hold = 'H';
    case Cancel = 'X';

    /** @return string[] */
    public static function allValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function valuesToString(string $separator = ','): string
    {
        return implode($separator, self::allValues());
    }
}
