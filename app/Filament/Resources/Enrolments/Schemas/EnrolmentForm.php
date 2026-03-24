<?php

namespace App\Filament\Resources\Enrolments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EnrolmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('prospectus_id')
                    ->required()
                    ->numeric(),
                TextInput::make('course_id')
                    ->required()
                    ->numeric(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('objectives')
                    ->required(),
                TextInput::make('objectives_other'),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
