<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING   = 'pending';
    case PREPARING = 'preparing';
    case READY     = 'ready';
    case CANCELLED = 'cancelled';

    public static function toArray(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $status) => [$status->name => $status->value])
            ->toArray();
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
