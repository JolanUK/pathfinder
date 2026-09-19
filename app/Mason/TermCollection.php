<?php

declare(strict_types=1);

namespace App\Mason;

class TermCollection
{
    public static function make(): array
    {
        return [
            Hero::class,
            TermCourses::class,
        ];
    }
}
