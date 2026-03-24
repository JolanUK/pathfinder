<?php

namespace App\Filament\Resources\Locations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                Textarea::make('excerpt')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('maximum_participants')
                    ->required()
                    ->numeric(),
                TextInput::make('postcode')
                    ->required(),
                TextInput::make('geolocation')
                    ->required(),
            ]);
    }
}
