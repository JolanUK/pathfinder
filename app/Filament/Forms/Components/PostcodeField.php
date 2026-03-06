<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Http\Client\ConnectionException;
use Filament\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Livewire\Component as Livewire;

class PostcodeField extends TextInput
{
    private string $qualityField = 'quality';
    private string $eastingsField = 'eastings';
    private string $northingsField = 'northings';
    private string $countryField = 'country';
    private string $nhsHAField = 'nhs_ha';
    private string $longitudeField = 'longitude';
    private string $latitudeField = 'latitude';
    private string $europeanElectoralRegionField = 'european_electoral_region';
    private string $primaryCareTrustField = 'primary_care_trust';
    private string $regionField = 'region';
    private string $lsoaField = 'lsoa';
    private string $msoaField = 'msoa';
    private string $incodeField = 'incode';
    private string $outcodeField = 'outcode';
    private string $parliamentaryConstituencyField = 'parliamentary_constituency';
    private string $parliamentaryConstituency2024Field = 'parliamentary_constituency_2024';
    private string $adminDistrictField = 'admin_district';
    private string $parishField = 'parish';
    private string $adminCountyField = 'admin_county';
    private string $dateOfIntroductionField = 'date_of_introduction';
    private string $adminWardField = 'admin_ward';
    private string $cedField = 'ced';
    private string $ccgField = 'ccg';
    private string $nutsField = 'nuts';
    private string $pfaField = 'pfa';
    private string $nhsRegionField = 'nhs_region';
    private string $ttwaField = 'ttwa';
    private string $nationalParkField = 'national_park';
    private string $buaField = 'bua';
    private string $icbField = 'icb';
    private string $cancerAllianceField = 'cancer_alliance';
    private string $lsoa11Field = 'lsoa11';
    private string $msoa11Field = 'msoa11';
    private string $lsoa21Field = 'lsoa21';
    private string $msoa21Field = 'msoa21';
    private string $oa21Field = 'oa21';
    private string $ruc11Field = 'ruc11';
    private string $ruc21Field = 'ruc21';
    private string $lep1Field = 'lep1';
    private string $lep2Field = 'lep2';

    protected function setUp(): void {
        parent::setUp();

        $this->live();
        $this->minLength(6);
        $this->maxLength(8);
        $this->required();
        $this->rules(['required', 'min:6', 'max:8']);

        $this->afterStateUpdated(function (Livewire $livewire, Component $component, Set $set, ?string $state, ?string $old) {
            $livewire->validateOnly($component->getStatePath());
            $postcode = $this->getPostcode($state);
            $this->castPostcodeFields($postcode, $set);
        });
    }

    public function getPostcode($postcode): array
    {
        $response = [];
        $postcode = trim($postcode);

        $service = 'https://api.postcodes.io/postcodes/' . $postcode;

        try {
            $response = Http::get($service)->json();

            if (Arr::has($response, 'error')) {
                Notification::make()
                    ->warning()
                    ->title('Error')
                    ->body('You\'ve set an invalid postcode. Please try again.')
                    ->send();

                return [];
            }

            $response = Arr::only($response, ['result']);

            return self::getPostcodeResponse($response);

        } catch (ConnectionException) {
            Notification::make()
                ->warning()
                ->title('Couldn\'t retrieve a postcode.')
                ->body('The API may be temporarily down. Please try again later.')
                ->send();
        }

        return $response;
    }

    private static function getPostcodeResponse(array $responseData): array
    {
        $data = [
            'quality' => Arr::get($responseData, 'result.quality'),
            'eastings' => Arr::get($responseData, 'result.eastings'),
            'northings' => Arr::get($responseData, 'result.northings'),
            'country' => Arr::get($responseData, 'result.country'),
            'nhs_ha' => Arr::get($responseData, 'result.nhs_ha'),
            'longitude' => Arr::get($responseData, 'result.longitude'),
            'latitude' => Arr::get($responseData, 'result.latitude'),
            'european_electoral_region' => Arr::get($responseData, 'result.european_electoral_region'),
            'primary_care_trust' => Arr::get($responseData, 'result.primary_care_trust'),
            'region' => Arr::get($responseData, 'result.region'),
            'lsoa' => Arr::get($responseData, 'result.lsoa'),
            'msoa' => Arr::get($responseData, 'result.msoa'),
            'incode' => Arr::get($responseData, 'result.incode'),
            'outcode' => Arr::get($responseData, 'result.outcode'),
            'parliamentary_constituency' => Arr::get($responseData, 'result.parliamentary_constituency'),
            'parliamentary_constituency_2024' => Arr::get($responseData, 'result.parliamentary_constituency_2024'),
            'admin_district' => Arr::get($responseData, 'result.admin_district'),
            'parish' => Arr::get($responseData, 'result.parish'),
            'admin_county' => Arr::get($responseData, 'result.admin_county'),
            'date_of_introduction' => Arr::get($responseData, 'result.date_of_introduction'),
            'admin_ward' => Arr::get($responseData, 'result.admin_ward'),
            'ced' => Arr::get($responseData, 'result.ced'),
            'ccg' => Arr::get($responseData, 'result.ccg'),
            'nuts' => Arr::get($responseData, 'result.nuts'),
            'pfa' => Arr::get($responseData, 'result.pfa'),
            'nhs_region' => Arr::get($responseData, 'result.nhs_region'),
            'ttwa' => Arr::get($responseData, 'result.ttwa'),
            'national_park' => Arr::get($responseData, 'result.national_park'),
            'bua' => Arr::get($responseData, 'result.bua'),
            'icb' => Arr::get($responseData, 'result.icb'),
            'cancer_alliance' => Arr::get($responseData, 'result.cancer_alliance'),
            'lsoa11' => Arr::get($responseData, 'result.lsoa11'),
            'msoa11' => Arr::get($responseData, 'result.msoa11'),
            'lsoa21' => Arr::get($responseData, 'result.lsoa21'),
            'msoa21' => Arr::get($responseData, 'result.msoa21'),
            'oa21' => Arr::get($responseData, 'result.oa21'),
            'ruc11' => Arr::get($responseData, 'result.ruc11'),
            'ruc21' => Arr::get($responseData, 'result.ruc21'),
            'lep1' => Arr::get($responseData, 'result.lep1'),
            'lep2' => Arr::get($responseData, 'result.lep2'),
        ];

        return $data;
    }

    public function castPostcodeFields($postcodeResponse, $set): void
    {
        if (! empty($postcodeResponse['quality'])) {
            $set($this->qualityField, $postcodeResponse['quality']);
        }

        if (! empty($postcodeResponse['eastings'])) {
            $set($this->eastingsField, $postcodeResponse['eastings']);
        }

        if (! empty($postcodeResponse['northings'])) {
            $set($this->northingsField, $postcodeResponse['northings']);
        }

        if (! empty($postcodeResponse['country'])) {
            $set($this->countryField, $postcodeResponse['country']);
        }

        if (! empty($postcodeResponse['nhs_ha'])) {
            $set($this->nhsHAField, $postcodeResponse['nhs_ha']);
        }

        if (! empty($postcodeResponse['longitude'])) {
            $set($this->longitudeField, $postcodeResponse['longitude']);
        }

        if (! empty($postcodeResponse['latitude'])) {
            $set($this->latitudeField, $postcodeResponse['latitude']);
        }

        if (! empty($postcodeResponse['european_electoral_region'])) {
            $set($this->europeanElectoralRegionField, $postcodeResponse['european_electoral_region']);
        }

        if (! empty($postcodeResponse['primary_care_trust'])) {
            $set($this->primaryCareTrustField, $postcodeResponse['primary_care_trust']);
        }

        if (! empty($postcodeResponse['region'])) {
            $set($this->regionField, $postcodeResponse['region']);
        }

        if (! empty($postcodeResponse['lsoa'])) {
            $set($this->lsoaField, $postcodeResponse['lsoa']);
        }

        if (! empty($postcodeResponse['msoa'])) {
            $set($this->msoaField, $postcodeResponse['msoa']);
        }

        if (! empty($postcodeResponse['incode'])) {
            $set($this->incodeField, $postcodeResponse['incode']);
        }

        if (! empty($postcodeResponse['outcode'])) {
            $set($this->outcodeField, $postcodeResponse['outcode']);
        }

        if (! empty($postcodeResponse['parliamentary_constituency'])) {
            $set($this->parliamentaryConstituencyField, $postcodeResponse['parliamentary_constituency']);
        }

        if (! empty($postcodeResponse['parliamentary_constituency_2024'])) {
            $set($this->parliamentaryConstituency2024Field, $postcodeResponse['parliamentary_constituency_2024']);
        }

        if (! empty($postcodeResponse['admin_district'])) {
            $set($this->adminDistrictField, $postcodeResponse['admin_district']);
        }

        if (! empty($postcodeResponse['parish'])) {
            $set($this->parishField, $postcodeResponse['parish']);
        }

        if (! empty($postcodeResponse['admin_county'])) {
            $set($this->adminCountyField, $postcodeResponse['admin_county']);
        }

        if (! empty($postcodeResponse['date_of_introduction'])) {
            $set($this->dateOfIntroductionField, $postcodeResponse['date_of_introduction']);
        }

        if (! empty($postcodeResponse['admin_ward'])) {
            $set($this->adminWardField, $postcodeResponse['admin_ward']);
        }

        if (! empty($postcodeResponse['ced'])) {
            $set($this->cedField, $postcodeResponse['ced']);
        }

        if (! empty($postcodeResponse['ccg'])) {
            $set($this->ccgField, $postcodeResponse['ccg']);
        }

        if (! empty($postcodeResponse['nuts'])) {
            $set($this->nutsField, $postcodeResponse['nuts']);
        }

        if (! empty($postcodeResponse['pfa'])) {
            $set($this->pfaField, $postcodeResponse['pfa']);
        }

        if (! empty($postcodeResponse['nhs_region'])) {
            $set($this->nhsRegionField, $postcodeResponse['nhs_region']);
        }

        if (! empty($postcodeResponse['ttwa'])) {
            $set($this->ttwaField, $postcodeResponse['ttwa']);
        }

        if (! empty($postcodeResponse['national_park'])) {
            $set($this->nationalParkField, $postcodeResponse['national_park']);
        }

        if (! empty($postcodeResponse['bua'])) {
            $set($this->buaField, $postcodeResponse['bua']);
        }

        if (! empty($postcodeResponse['icb'])) {
            $set($this->icbField, $postcodeResponse['icb']);
        }

        if (! empty($postcodeResponse['cancer_alliance'])) {
            $set($this->cancerAllianceField, $postcodeResponse['cancer_alliance']);
        }

        if (! empty($postcodeResponse['lsoa11'])) {
            $set($this->lsoa11Field, $postcodeResponse['lsoa11']);
        }

        if (! empty($postcodeResponse['msoa11'])) {
            $set($this->msoa11Field, $postcodeResponse['msoa11']);
        }

        if (! empty($postcodeResponse['lsoa21'])) {
            $set($this->lsoa21Field, $postcodeResponse['lsoa21']);
        }

        if (! empty($postcodeResponse['msoa21'])) {
            $set($this->msoa21Field, $postcodeResponse['msoa21']);
        }

        if (! empty($postcodeResponse['oa21'])) {
            $set($this->oa21Field, $postcodeResponse['oa21']);
        }

        if (! empty($postcodeResponse['ruc11'])) {
            $set($this->ruc11Field, $postcodeResponse['ruc11']);
        }

        if (! empty($postcodeResponse['ruc21'])) {
            $set($this->ruc21Field, $postcodeResponse['ruc21']);
        }

        if (! empty($postcodeResponse['lep1'])) {
            $set($this->lep1Field, $postcodeResponse['lep1']);
        }

        if (! empty($postcodeResponse['lep2'])) {
            $set($this->lep2Field, $postcodeResponse['lep2']);
        }
    }
}
