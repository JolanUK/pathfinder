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
                                        ->options(SubjectPronouns::class)
                                        ->required(),
                                    Select::make('objectPronoun')
                                        ->options(ObjectPronouns::class)
                                        ->required(),
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
                                TextInput::make('quality')
                                    ->readOnly(),
                                TextInput::make('eastings')
                                    ->readOnly(),
                                TextInput::make('northings')
                                    ->readOnly(),
                                TextInput::make('country')
                                    ->readOnly(),
                                TextInput::make('nhs_ha')
                                    ->readOnly(),
                                TextInput::make('longitude')
                                    ->readOnly(),
                                TextInput::make('latitude')
                                    ->readOnly(),
                                TextInput::make('european_electoral_region')
                                    ->readOnly(),
                                TextInput::make('primary_care_trust')
                                    ->readOnly(),
                                TextInput::make('region')
                                    ->readOnly(),
                                TextInput::make('lsoa')
                                    ->readOnly(),
                                TextInput::make('msoa')
                                    ->readOnly(),
                                TextInput::make('incode')
                                    ->readOnly(),
                                TextInput::make('outcode')
                                    ->readOnly(),
                                TextInput::make('parliamentary_constituency')
                                    ->readOnly(),
                                TextInput::make('parliamentary_constituency_2024')
                                    ->readOnly(),
                                TextInput::make('admin_district')
                                    ->readOnly(),
                                TextInput::make('parish')
                                    ->readOnly(),
                                TextInput::make('admin_county')
                                    ->readOnly(),
                                TextInput::make('date_of_introduction')
                                    ->readOnly(),
                                TextInput::make('admin_ward')
                                    ->readOnly(),
                                TextInput::make('ced')
                                    ->readOnly(),
                                TextInput::make('ccg')
                                    ->readOnly(),
                                TextInput::make('nuts')
                                    ->readOnly(),
                                TextInput::make('pfa')
                                    ->readOnly(),
                                TextInput::make('nhs_region')
                                    ->readOnly(),
                                TextInput::make('ttwa')
                                    ->readOnly(),
                                TextInput::make('national_park')
                                    ->readOnly(),
                                TextInput::make('bua')
                                    ->readOnly(),
                                TextInput::make('icb')
                                    ->readOnly(),
                                TextInput::make('cancer_alliance')
                                    ->readOnly(),
                                TextInput::make('lsoa11')
                                    ->readOnly(),
                                TextInput::make('msoa11')
                                    ->readOnly(),
                                TextInput::make('lsoa21')
                                    ->readOnly(),
                                TextInput::make('msoa21')
                                    ->readOnly(),
                                TextInput::make('oa21')
                                    ->readOnly(),
                                TextInput::make('ruc11')
                                    ->readOnly(),
                                TextInput::make('ruc21')
                                    ->readOnly(),
                                TextInput::make('lep1')
                                    ->readOnly(),
                                TextInput::make('lep2')
                                    ->readOnly(),
                            ])
                            ->columns(2),
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
