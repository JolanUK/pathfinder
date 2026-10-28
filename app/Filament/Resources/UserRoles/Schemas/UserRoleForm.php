<?php

namespace App\Filament\Resources\UserRoles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserRoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('role_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
