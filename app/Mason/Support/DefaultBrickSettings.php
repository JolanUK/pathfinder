<?php

declare(strict_types=1);

namespace App\Mason\Support;

use Filament\Forms\Components\ColorPicker;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;

class DefaultBrickSettings
{
    public static function getCommonFormFills(): array
    {
        return [
            'background_light' => $arguments['config']['background_light'] ?? '#FFFFFF',
            'background_dark' => $arguments['config']['background_dark'] ?? '#000000',
        ];
    }

    public static function getCommonSchema(): array
    {
        return [
            Section::make()
                ->contained(false)
                ->extraAttributes(['class' => 'fi-sc-custom'])
                ->label('Default settings')
                ->schema([
                    FusedGroup::make([
                        ColorPicker::make('background_light')
                            ->label('Background colour (light)')
                            ->live(debounce: 500)
                            ->prefix('Light'),
                        ColorPicker::make('background_dark')
                            ->label('Background colour (dark)')
                            ->live(debounce: 500)
                            ->prefix('Dark'),
                    ])
                        ->columns(2)
                        ->label('Background'),
                ]),
        ];
    }
}
