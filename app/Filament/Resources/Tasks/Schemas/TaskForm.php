<?php

namespace App\Filament\Resources\Tasks\Schemas;

use App\Enums\TaskStatuses;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->columnSpan(2)
                    ->required(),
                RichEditor::make('description')
                    ->columnSpan(2)
                    ->required(),
                DateTimePicker::make('start_date')
                    ->defaultFocusedDate(now())
                    ->native(false)
                    ->placeholder(now())
                    ->required()
                    ->seconds(false),
                DateTimePicker::make('end_date')
                    ->defaultFocusedDate(now())
                    ->minDate(now())
                    ->native(false)
                    ->placeholder(now())
                    ->required()
                    ->seconds(false),
                Select::make('creator')
                    ->default(fn () => auth()->id())
                    ->native(false)
                    ->relationship(name: 'taskCreator', titleAttribute: 'name')
                    ->required(),
                Select::make('resources')
                    ->label('Assigned to')
                    ->multiple()
                    ->native(false)
                    ->relationship(name: 'taskResources', titleAttribute: 'name')
                    ->required(),
                Select::make('status')
                    ->columnSpan(2)
                    ->options(TaskStatuses::class),
            ]);
    }
}
