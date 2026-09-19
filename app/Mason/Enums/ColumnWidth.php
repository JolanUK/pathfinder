<?php

declare(strict_types=1);

namespace App\Mason\Enums;

use Filament\Support\Contracts\HasLabel;

enum ColumnWidth: string implements HasLabel
{
    case Two = 'two';
    case Three = 'three';
    case Four = 'four';
    case FixedTwo = 'fixed-two';
    case FixedThree = 'fixed-three';
    case FixedFour = 'fixed-four';
    case AsymmetricLeftThirds = 'asymmetric-left-thirds';
    case AsymmetricRightThirds = 'asymmetric-right-thirds';
    case AsymmetricLeftFourths = 'asymmetric-left-fourths';
    case AsymmetricRightFourths = 'asymmetric-right-fourths';

    public function getLabel(): string
    {
        return match ($this) {
            self::Two => 'Two Columns',
            self::Three => 'Three Columns',
            self::Four => 'Four Columns',
            self::FixedTwo => 'Fixed Two Columns',
            self::FixedThree => 'Fixed Three Columns',
            self::FixedFour => 'Fixed Four Columns',
            self::AsymmetricLeftThirds => 'Asymmetric Left Thirds',
            self::AsymmetricRightThirds => 'Asymmetric Right Thirds',
            self::AsymmetricLeftFourths => 'Asymmetric Left Fourths',
            self::AsymmetricRightFourths => 'Asymmetric Right Fourths',
        };
    }
}
