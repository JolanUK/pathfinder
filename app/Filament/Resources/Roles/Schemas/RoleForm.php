<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('description')
                    ->required(),
                TextInput::make('hierarchy')
                    ->required()
                    ->numeric(),
                TextInput::make('guard_name')
                    ->required(),
                Textarea::make('settings')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
