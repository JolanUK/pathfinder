<?php

namespace App\Filament\Resources\Participants\Schemas;

use App\Enums\ObjectPronouns;
use App\Enums\SubjectPronouns;
use App\Filament\Forms\Components\PostcodeField;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class ParticipantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make()
                    ->tabs([
                        Tab::make(__('Basic information'))
                            ->schema([
                                Select::make('user')
                                    ->label(__('Associated user account'))
                                    ->belowLabel(__('Please make sure the participant you are registering already has an account with us.'))
                                    ->relationship(titleAttribute: 'name')
                                    ->searchable()
                                    ->loadingMessage(__('Loading users...'))
                                    ->native(false)
                                    ->required(),
                                TextInput::make('firstName')
                                    ->required(),
                                TextInput::make('surname')
                                    ->required(),
                                FusedGroup::make([
                                    Select::make('subjectPronoun')
                                        ->options(SubjectPronouns::class),
                                    Select::make('objectPronoun')
                                        ->options(ObjectPronouns::class),
                                ])
                                    ->label(__('Pronouns'))
                                    ->columns(),
                                DatePicker::make('dob')
                                    ->label(__('Date of birth'))
                                    ->required(),
                            ]),
                        Tab::make('Contact information')
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email address')
                                    ->email()
                                    ->required(),
                                TextInput::make('telephone')
                                    ->tel()
                                    ->required(),
                                Textarea::make('address')
                                    ->required()
                                    ->columnSpanFull(),
                                PostcodeField::make('postcode')
                                    ->live()
                                    ->required(),
                            ]),
                        Tab::make('Geography')
                            ->schema([
                                TextInput::make('quality'),
                                TextInput::make('eastings'),
                                TextInput::make('northings'),
                                TextInput::make('country'),
                                TextInput::make('nhs_ha'),
                                TextInput::make('longitude'),
                                TextInput::make('latitude'),
                                TextInput::make('european_electoral_region'),
                                TextInput::make('primary_care_trust'),
                                TextInput::make('region'),
                                TextInput::make('lsoa'),
                                TextInput::make('msoa'),
                                TextInput::make('incode'),
                                TextInput::make('outcode'),
                                TextInput::make('parliamentary_constituency'),
                                TextInput::make('parliamentary_constituency_2024'),
                                TextInput::make('admin_district'),
                                TextInput::make('parish'),
                                TextInput::make('admin_county'),
                                TextInput::make('date_of_introduction'),
                                TextInput::make('admin_ward'),
                                TextInput::make('ced'),
                                TextInput::make('ccg'),
                                TextInput::make('nuts'),
                                TextInput::make('pfa'),
                                TextInput::make('nhs_region'),
                                TextInput::make('ttwa'),
                                TextInput::make('national_park'),
                                TextInput::make('bua'),
                                TextInput::make('icb'),
                                TextInput::make('cancer_alliance'),
                                TextInput::make('lsoa11'),
                                TextInput::make('msoa11'),
                                TextInput::make('lsoa21'),
                                TextInput::make('msoa21'),
                                TextInput::make('oa21'),
                                TextInput::make('ruc11'),
                                TextInput::make('ruc21'),
                                TextInput::make('lep1'),
                                TextInput::make('lep2'),
                            ]),
                        Tab::make('Emergency contact')
                            ->schema([
                                Toggle::make('emergencyConsent'),
                                TextInput::make('emergencyFirstName'),
                                TextInput::make('emergencySurname'),
                                TextInput::make('emergencyRelationship'),
                                TextInput::make('emergencyTelephone')
                                    ->tel(),
                            ]),
                        Tab::make(__('Referrer'))
                            ->schema([
                                TextInput::make('referrer')
                                    ->required(),
                                TextInput::make('referrerOther'),
                            ]),
                        Tab::make(__('Accessibility'))
                            ->schema([
                                TextInput::make('disabilities')
                                    ->required(),
                                TextInput::make('difficulties')
                                    ->required(),
                            ]),
                        Tab::make(__('Demographic'))
                            ->schema([
                                TextInput::make('ethnicity')
                                    ->required(),
                                TextInput::make('gender')
                                    ->required(),
                                TextInput::make('age')
                                    ->required(),
                            ]),
                        Tab::make(__('Consent'))
                            ->schema([
                                Toggle::make('declaration'),
                                Toggle::make('surveys'),
                            ]),
                    ])
                    ->columnSpan(2),
            ]);
    }
}
