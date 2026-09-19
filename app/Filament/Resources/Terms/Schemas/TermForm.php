<?php

namespace App\Filament\Resources\Terms\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;

class TermForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->live(onBlur: true)
                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('Please make sure this has a unique value.'))
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make('slug')
                    ->disabled()
                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('This generates the URL to the front-facing page. Please be aware, when you change the Title it\'ll change this too.')),
                DateTimePicker::make('start_date')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->required()
                    ->seconds(false),
                DateTimePicker::make('end_date')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->required()
                    ->seconds(false),
                Textarea::make('excerpt')
                    ->columnSpanFull()
                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('This appears as the teaser text underneath wherever the current Term has been referenced as a card.'))
                    ->required(),
            ]);
    }
}
