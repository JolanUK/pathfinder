<?php

namespace App\Filament\Resources\Locations\Schemas;

use App\Filament\Forms\Components\PostcodeField;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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
                PostcodeField::make('postcode'),
                TextInput::make('longitude'),
                TextInput::make('latitude'),
            ]);
    }
}
