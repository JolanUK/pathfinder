<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroups;
use App\Settings\CourseSettings;
use App\Settings\StyleSettings;
use Awcodes\Palette\Forms\Components\ColorPicker;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Str;
use UnitEnum;

class ManageCourseSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAcademicCap;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::Settings;

    protected static string $settings = CourseSettings::class;

    protected static ?string $slug = 'settings/course';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Course Information'))
                    ->schema([
                        Repeater::make('courseTypes')
                            ->schema([
                                TextInput::make('id')
                                    ->readOnly()
                                    ->hintIcon(Heroicon::QuestionMarkCircle, tooltip: __('This generates the ID of the course type. Please be aware, when you change the Name it\'ll change this too.'))
                                    ->label(__('ID'))
                                    ->live(debounce: 500),
                                TextInput::make('name')
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('id', Str::slug($state)))
                                    ->required()
                                    ->live(debounce: 500),
                                ColorPicker::make('theme')
                                    ->colors([
                                        "primaryLight" => Color::hex(app(StyleSettings::class)->primaryLight),
                                        "secondaryLight" => Color::hex(app(StyleSettings::class)->secondaryLight),
                                        "tertiaryLight" => Color::hex(app(StyleSettings::class)->tertiaryLight),
                                        "quaternaryLight" => Color::hex(app(StyleSettings::class)->quaternaryLight),
                                        "quinaryLight" => Color::hex(app(StyleSettings::class)->quinaryLight),
                                        "senaryLight" => Color::hex(app(StyleSettings::class)->senaryLight),
                                    ])
                                    ->storeAsKey(),
                            ])
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null)
                            ->columns(2)
                    ]),
            ]);
    }
}
