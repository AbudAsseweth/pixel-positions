<?php

namespace App\Enums;

enum JobSchedule: string
{
    case FULL_TIME = 'Full Time';
    case PART_TIME = 'Part Time';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
