<?php

namespace App\Filament\Resources\Attendances\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('enrolment_id')
                    ->required()
                    ->numeric(),
                TextInput::make('module_id')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required(),
                TextInput::make('status_reason'),
            ]);
    }
}
