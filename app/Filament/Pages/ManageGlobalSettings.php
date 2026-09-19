<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroups;
use App\Settings\GlobalSettings;
use BackedEnum;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageGlobalSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedGlobeEuropeAfrica;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Settings;

    protected static string $settings = GlobalSettings::class;

    protected static ?string $slug = 'settings/global';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('appName')
                    ->label('Application Name')
                    ->required(),
                TextInput::make('currentTerm')
                    ->label('Current Term')
                    ->required(),
            ])
            ->columns(1);
    }
}
