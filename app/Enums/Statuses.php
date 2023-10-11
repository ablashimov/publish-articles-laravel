<?php

declare(strict_types=1);

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ACTIVE()
 * @method static self INACTIVE()
 */
final class Statuses extends Enum
{
    public static function getAllStatuses(): array
    {
        return array_map(
            static fn($status) => $status->value,
            self::cases()
        );
    }
}
