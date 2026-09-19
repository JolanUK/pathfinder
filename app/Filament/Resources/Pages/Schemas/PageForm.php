<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Mason\BrickCollection;
use Awcodes\Mason\Mason;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required()
                    ->disabled(),
                Mason::make('content')
                    ->bricks(BrickCollection::make())
                    ->doubleClickToEdit()
                    ->previewLayout('components.layouts.mason-preview')
                    ->extraInputAttributes(['style' => 'min-height: 30rem;'])
                    ->displayActionsAsGrid()
                    ->colorModeToggle()
                    ->columnSpanFull(),
            ]);
    }
}
