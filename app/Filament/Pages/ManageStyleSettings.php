<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroups;
use App\Settings\StyleSettings;
use BackedEnum;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Callout;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageStyleSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPaintBrush;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Settings;

    protected static string $settings = StyleSettings::class;

    protected static ?string $slug = 'settings/style';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Logos'))
                    ->columns(2)
                    ->schema([
                        FileUpload::make('logoLight')
                            ->columnSpan('half')
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(2)
                            ->label('Logo (Light)')
                            ->live()
                            ->disk('public')
                            ->visibility('public'),
                        FileUpload::make('logoDark')
                            ->columnSpan('half')
                            ->image()
                            ->imageEditor()
                            ->imageEditorMode(2)
                            ->label('Logo (Dark)')
                            ->live()
                            ->disk('public')
                            ->visibility('public'),
                    ]),

                Section::make(__('Branding'))
                    ->columns(2)
                    ->schema([
                        Callout::make()
                            ->columnSpanFull()
                            ->description(__('Changes made here will affect the whole appearance of your application, both administratively and on the frontend. It\'s only recommended to make these changes in a development environment, then transfer them here.'))
                            ->warning(),
                        Section::make()
                            ->contained(false)
                            ->schema([
                                ColorPicker::make('primaryLight')
                                    ->belowLabel(__('This will correspond to the main background colour of the application. It\'s recommended to set this as close to pure white as possible.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#FFFFFF');
                                        }
                                    })
                                    ->label('Primary background (light)')
                                    ->live(debounce: 500),

                                ColorPicker::make('secondaryLight')
                                    ->belowLabel(__('This will correspond to alternative-coloured backgrounds of blocks, to break up the flow of longer pages. It\'s recommended to set this as a washed-out grey that isn\'t the same as the primary background colour above.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#F6F6F6');
                                        }
                                    })
                                    ->label('Secondary background (light)')
                                    ->live(debounce: 500),

                                ColorPicker::make('tertiaryLight')
                                    ->belowLabel(__('This is the main accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#DFDAF3');
                                        }
                                    })
                                    ->label('Primary palette colour (light)')
                                    ->live(debounce: 500),

                                ColorPicker::make('quaternaryLight')
                                    ->belowLabel(__('This is the secondary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#EED2D3');
                                        }
                                    })
                                    ->label('Secondary palette colour (light)')
                                    ->live(debounce: 500),

                                ColorPicker::make('quinaryLight')
                                    ->belowLabel(__('This is the tertiary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#85C3E1');
                                        }
                                    })
                                    ->label('Tertiary palette colour (light)')
                                    ->live(debounce: 500),

                                ColorPicker::make('senaryLight')
                                    ->belowLabel(__('This is the quaternary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#ABDCD5');
                                        }
                                    })
                                    ->label('Quaternary palette colour (light)')
                                    ->live(debounce: 500),
                            ]),
                        Section::make()
                            ->contained(false)
                            ->schema([
                                ColorPicker::make('primaryDark')
                                    ->belowLabel(__('This will correspond to the main background colour of the application in dark mode. It\'s recommended to set this as close to pure black as possible.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#000000');
                                        }
                                    })
                                    ->label('Primary background (dark)')
                                    ->live(debounce: 500),

                                ColorPicker::make('secondaryDark')
                                    ->belowLabel(__('This will correspond to alternative-coloured backgrounds of blocks, to break up the flow of longer pages. It\'s recommended to set this as a dark grey that isn\'t the same as the primary background colour above.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#111111');
                                        }
                                    })
                                    ->label('Secondary background (dark)')
                                    ->live(debounce: 500),

                                ColorPicker::make('tertiaryDark')
                                    ->belowLabel(__('This is the main accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#DFDAF3');
                                        }
                                    })
                                    ->label('Primary palette colour (dark)')
                                    ->live(debounce: 500),

                                ColorPicker::make('quaternaryDark')
                                    ->belowLabel(__('This is the secondary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#EED2D3');
                                        }
                                    })
                                    ->label('Secondary palette colour (dark)')
                                    ->live(debounce: 500),

                                ColorPicker::make('quinaryDark')
                                    ->belowLabel(__('This is the tertiary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#85C3E1');
                                        }
                                    })
                                    ->label('Tertiary palette colour (dark)')
                                    ->live(debounce: 500),

                                ColorPicker::make('senaryDark')
                                    ->belowLabel(__('This is the quaternary accent colour of the application.'))
                                    ->columnSpanFull()
                                    ->hex()
                                    ->afterStateHydrated(function (ColorPicker $component, $state) {
                                        if (blank($state)) {
                                            $component->state('#ABDCD5');
                                        }
                                    })
                                    ->label('Quaternary palette colour (dark)')
                                    ->live(debounce: 500),
                            ]),
                    ]),

            ]);
    }
}
