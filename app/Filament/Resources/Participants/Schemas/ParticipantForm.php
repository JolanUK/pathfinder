<?php

namespace App\Filament\Resources\Participants\Schemas;

use App\Enums\Referrers;
use App\Filament\Forms\Components\PostcodeField;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ParticipantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                TextInput::make('first_name'),
                TextInput::make('surname'),
                TextInput::make('subject_pronoun'),
                TextInput::make('object_pronoun'),
                TextInput::make('telephone')
                    ->tel(),
                Textarea::make('address')
                    ->columnSpanFull(),
                PostcodeField::make('postcode'),
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
                DatePicker::make('dob'),
                Toggle::make('emergency_consent'),
                TextInput::make('emergency_first_name'),
                TextInput::make('emergency_surname'),
                TextInput::make('emergency_relationship'),
                TextInput::make('emergency_telephone')
                    ->tel(),
                Select::make('referrer')
                    ->label('Referrer(s)')
                    ->options(Referrers::class)
                    ->required()
                    ->validationMessages([
                        'required' => 'Please set a valid :attribute.',
                    ]),
                TextInput::make('referrer_other'),
                TextInput::make('disabilities'),
                TextInput::make('difficulties'),
                TextInput::make('ethnicity'),
                TextInput::make('gender'),
                TextInput::make('age'),
                Toggle::make('declaration'),
                Toggle::make('surveys'),
            ]);
    }
}
