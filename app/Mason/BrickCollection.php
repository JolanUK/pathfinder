<?php

declare(strict_types=1);

namespace App\Mason;

class BrickCollection
{
    public static function make(): array
    {
        return [
            Section::class,
            Cards::class,
            Grid::class,
            DynamicContent::class,
        ];
    }
}
