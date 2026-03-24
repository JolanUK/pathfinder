<?php

namespace App\Filament\Resources\Prospectuses\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProspectusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('start_date')
                    ->required(),
                TextInput::make('end_date')
                    ->required(),
                Textarea::make('excerpt')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('content')
                    ->required(),
            ]);
    }
}
