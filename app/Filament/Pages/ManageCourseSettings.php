<?php

namespace App\Filament\Pages;

use App\Enums\NavigationGroups;
use App\Settings\CourseSettings;
use BackedEnum;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
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
                            ->simple(
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true),
                            )
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                    ]),
            ]);
    }
}
