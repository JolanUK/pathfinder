<?php

namespace App\Filament\Resources\Terms\Resources\Courses\Schemas;

use App\Settings\CourseSettings;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('course_type')
                    ->options(
                        collect(app(CourseSettings::class)->courseTypes)->pluck('name')->toArray()
                    )
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('excerpt')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('minimum_participants')
                    ->required()
                    ->numeric(),
                TextInput::make('maximum_participants')
                    ->required()
                    ->numeric(),
            ]);
    }
}
