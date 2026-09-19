<?php

namespace App\Services;

use App\Filament\Forms\Components\PostcodeField;

class PostcodeService
{
    private PostcodeField $field;

    public function __construct()
    {
        $this->field = PostcodeField::make('postcode')
            ->bindQualityField('quality')
            ->bindEastingsField('eastings')
            ->bindNorthingsField('northings')
            ->bindCountryField('country')
            ->bindNHSHAField('nhs_ha')
            ->bindLongitudeField('longitude')
            ->bindLatitudeField('latitude')
            ->bindEuropeanElectoralRegionField('european_electoral_region')
            ->bindPrimaryCareTrustField('primary_care_trust')
            ->bindRegionField('region')
            ->bindLSOAField('lsoa')
            ->bindMSOAField('msoa')
            ->bindIncodeField('incode')
            ->bindOutcodeField('outcode')
            ->bindParliamentaryConstituencyField('parliamentary_constituency')
            ->bindParliamentaryConstituency2024Field('parliamentary_constituency_2024')
            ->bindAdminDistrictField('admin_district')
            ->bindParishField('parish')
            ->bindAdminCountyField('admin_county')
            ->bindDateOfIntroductionField('date_of_introduction')
            ->bindAdminWardField('admin_ward')
            ->bindCEDField('ced')
            ->bindCCGField('ccg')
            ->bindNUTSField('nuts')
            ->bindPFAField('pfa')
            ->bindNHSRegionField('nhs_region')
            ->bindTTWAField('ttwa')
            ->bindNationalParkField('national_park')
            ->bindBUAField('bua')
            ->bindICBField('icb')
            ->bindCancerAllianceField('cancer_alliance')
            ->bindLSOA11Field('lsoa11')
            ->bindMSOA11Field('msoa11')
            ->bindLSOA21Field('lsoa21')
            ->bindMSOA21Field('msoa21')
            ->bindOA21Field('oa21')
            ->bindRUC11Field('ruc11')
            ->bindRUC21Field('ruc21')
            ->bindLEP1Field('lep1')
            ->bindLEP2Field('lep2');
    }

    public function getPostcodeData(string $postcode): array
    {
        $data = [];

        $set = function ($field, $value) use (&$data) {
            $data[$field] = $value;
        };

        $this->field->getPostcode($postcode, $set);

        return $data;
    }

    public function getPostcodeDataForModel(string $postcode, array $additionalFields = []): array
    {
        $data = $this->getPostcodeData($postcode);

        return [
            'postcode' => $postcode,
            'quality' => $data['quality'] ?? null,
            'eastings' => $data['eastings'] ?? null,
            'northings' => $data['northings'] ?? null,
            'country' => $data['country'] ?? null,
            'nhs_ha' => $data['nhs_ha'] ?? null,
            'longitude' => $data['longitude'] ?? null,
            'latitude' => $data['latitude'] ?? null,
            'european_electoral_region' => $data['european_electoral_region'] ?? null,
            'primary_care_trust' => $data['primary_care_trust'] ?? null,
            'region' => $data['region'] ?? null,
            'lsoa' => $data['lsoa'] ?? null,
            'msoa' => $data['msoa'] ?? null,
            'incode' => $data['incode'] ?? null,
            'outcode' => $data['outcode'] ?? null,
            'parliamentary_constituency' => $data['parliamentary_constituency'] ?? null,
            'parliamentary_constituency_2024' => $data['parliamentary_constituency_2024'] ?? null,
            'admin_district' => $data['admin_district'] ?? null,
            'parish' => $data['parish'] ?? null,
            'admin_county' => $data['admin_county'] ?? null,
            'date_of_introduction' => $data['date_of_introduction'] ?? null,
            'admin_ward' => $data['admin_ward'] ?? null,
            'ced' => $data['ced'] ?? null,
            'ccg' => $data['ccg'] ?? null,
            'nuts' => $data['nuts'] ?? null,
            'pfa' => $data['pfa'] ?? null,
            'nhs_region' => $data['nhs_region'] ?? null,
            'ttwa' => $data['ttwa'] ?? null,
            'national_park' => $data['national_park'] ?? null,
            'bua' => $data['bua'] ?? null,
            'icb' => $data['icb'] ?? null,
            'cancer_alliance' => $data['cancer_alliance'] ?? null,
            'lsoa11' => $data['lsoa11'] ?? null,
            'msoa11' => $data['msoa11'] ?? null,
            'lsoa21' => $data['lsoa21'] ?? null,
            'msoa21' => $data['msoa21'] ?? null,
            'oa21' => $data['oa21'] ?? null,
            'ruc11' => $data['ruc11'] ?? null,
            'ruc21' => $data['ruc21'] ?? null,
            'lep1' => $data['lep1'] ?? null,
            'lep2' => $data['lep2'] ?? null,
        ] + $additionalFields;
    }
}
