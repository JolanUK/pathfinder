<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroups;
use App\Settings\ParticipantSettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageParticipantSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Settings;

    protected static string $settings = ParticipantSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Identity Information'))
                    ->columns(2)
                    ->schema([
                        Repeater::make('subjectPronouns')
                            ->simple(
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true),
                            )
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                        Repeater::make('objectPronouns')
                            ->simple(
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true),
                            )
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                    ]),
                Section::make(__('Safeguarding Information'))
                    ->schema([
                        TextInput::make('minimumAge')
                            ->label('Minimum Participant Age')
                            ->required(),
                    ]),
            ]);
    }
}
