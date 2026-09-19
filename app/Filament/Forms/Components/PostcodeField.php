<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;

class PostcodeField extends TextInput
{
    protected ?string $postcode = '';

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

    protected function setUp(): void
    {
        parent::setUp();

        $this->live()
            ->minLength(6)
            ->maxLength(8)
            ->required()
            ->rules(['required', 'min:6', 'max:8'])
            ->afterStateUpdated(function (?string $state, Set $set) {
                $this->getPostcode($state, $set);
            });
    }

    public function getPostcode(?string $postcode, Set $set): void
    {
        $this->postcode = $postcode;

        $service = resolve(PostcodeService::class);
        $validated = $service->validate($this->postcode);

        if ($validated) {
            $postcode = $service->getPostcode($this->postcode);

            $this->setFields($set, $postcode);

            return;
        } else {

            return;
        }
    }

    protected function setFields(Set $set, object $postcodeResponse): void
    {
        $fieldMappings = [
            'quality' => 'qualityField',
            'eastings' => 'eastingsField',
            'northings' => 'northingsField',
            'country' => 'countryField',
            'nhs_ha' => 'nhsHAField',
            'longitude' => 'longitudeField',
            'latitude' => 'latitudeField',
            'european_electoral_region' => 'europeanElectoralRegionField',
            'primary_care_trust' => 'primaryCareTrustField',
            'region' => 'regionField',
            'lsoa' => 'lsoaField',
            'msoa' => 'msoaField',
            'incode' => 'incodeField',
            'outcode' => 'outcodeField',
            'parliamentary_constituency' => 'parliamentaryConstituencyField',
            'parliamentary_constituency_2024' => 'parliamentaryConstituency2024Field',
            'admin_district' => 'adminDistrictField',
            'parish' => 'parishField',
            'admin_county' => 'adminCountyField',
            'date_of_introduction' => 'dateOfIntroductionField',
            'admin_ward' => 'adminWardField',
            'ced' => 'cedField',
            'ccg' => 'ccgField',
            'nuts' => 'nutsField',
            'pfa' => 'pfaField',
            'nhs_region' => 'nhsRegionField',
            'ttwa' => 'ttwaField',
            'national_park' => 'nationalParkField',
            'bua' => 'buaField',
            'icb' => 'icbField',
            'cancer_alliance' => 'cancerAllianceField',
            'lsoa11' => 'lsoa11Field',
            'msoa11' => 'msoa11Field',
            'lsoa21' => 'lsoa21Field',
            'msoa21' => 'msoa21Field',
            'oa21' => 'oa21Field',
            'ruc11' => 'ruc11Field',
            'ruc21' => 'ruc21Field',
            'lep1' => 'lep1Field',
            'lep2' => 'lep2Field',
        ];

        foreach ($fieldMappings as $propertyName => $fieldProperty) {
            if (isset($postcodeResponse->{$propertyName}) && ! empty($postcodeResponse->{$propertyName})) {
                $fieldName = $this->{$fieldProperty};
                $set($fieldName, $postcodeResponse->{$propertyName});
            }
        }
    }

    public function bindQualityField(string $qualityField): self
    {
        $this->qualityField = $qualityField;

        return $this;
    }

    public function bindEastingsField(string $eastingsField): self
    {
        $this->eastingsField = $eastingsField;

        return $this;
    }

    public function bindNorthingsField(string $northingsField): self
    {
        $this->northingsField = $northingsField;

        return $this;
    }

    public function bindCountryField(string $countryField): self
    {
        $this->countryField = $countryField;

        return $this;
    }

    public function bindNHSHAField(string $nhsHAField): self
    {
        $this->nhsHAField = $nhsHAField;

        return $this;
    }

    public function bindLongitudeField(string $longitudeField): self
    {
        $this->longitudeField = $longitudeField;

        return $this;
    }

    public function bindLatitudeField(string $latitudeField): self
    {
        $this->latitudeField = $latitudeField;

        return $this;
    }

    public function bindEuropeanElectoralRegionField(string $europeanElectoralRegionField): self
    {
        $this->europeanElectoralRegionField = $europeanElectoralRegionField;

        return $this;
    }

    public function bindPrimaryCareTrustField(string $primaryCareTrustField): self
    {
        $this->primaryCareTrustField = $primaryCareTrustField;

        return $this;
    }

    public function bindRegionField(string $regionField): self
    {
        $this->regionField = $regionField;

        return $this;
    }

    public function bindLSOAField(string $lsoaField): self
    {
        $this->lsoaField = $lsoaField;

        return $this;
    }

    public function bindMSOAField(string $msoaField): self
    {
        $this->msoaField = $msoaField;

        return $this;
    }

    public function bindIncodeField(string $incodeField): self
    {
        $this->incodeField = $incodeField;

        return $this;
    }

    public function bindOutcodeField(string $outcodeField): self
    {
        $this->outcodeField = $outcodeField;

        return $this;
    }

    public function bindParliamentaryConstituencyField(string $parliamentaryConstituencyField): self
    {
        $this->parliamentaryConstituencyField = $parliamentaryConstituencyField;

        return $this;
    }

    public function bindParliamentaryConstituency2024Field(string $parliamentaryConstituency2024Field): self
    {
        $this->parliamentaryConstituency2024Field = $parliamentaryConstituency2024Field;

        return $this;
    }

    public function bindAdminDistrictField(string $adminDistrictField): self
    {
        $this->adminDistrictField = $adminDistrictField;

        return $this;
    }

    public function bindParishField(string $parishField): self
    {
        $this->parishField = $parishField;

        return $this;
    }

    public function bindAdminCountyField(string $adminCountyField): self
    {
        $this->adminCountyField = $adminCountyField;

        return $this;
    }

    public function bindDateOfIntroductionField(string $dateOfIntroductionField): self
    {
        $this->dateOfIntroductionField = $dateOfIntroductionField;

        return $this;
    }

    public function bindAdminWardField(string $adminWardField): self
    {
        $this->adminWardField = $adminWardField;

        return $this;
    }

    public function bindCEDField(string $cedField): self
    {
        $this->cedField = $cedField;

        return $this;
    }

    public function bindCCGField(string $ccgField): self
    {
        $this->ccgField = $ccgField;

        return $this;
    }

    public function bindNUTSField(string $nutsField): self
    {
        $this->nutsField = $nutsField;

        return $this;
    }

    public function bindPFAField(string $pfaField): self
    {
        $this->pfaField = $pfaField;

        return $this;
    }

    public function bindNHSRegionField(string $nhsRegionField): self
    {
        $this->nhsRegionField = $nhsRegionField;

        return $this;
    }

    public function bindTTWAField(string $ttwaField): self
    {
        $this->ttwaField = $ttwaField;

        return $this;
    }

    public function bindNationalParkField(string $nationalParkField): self
    {
        $this->nationalParkField = $nationalParkField;

        return $this;
    }

    public function bindBUAField(string $buaField): self
    {
        $this->buaField = $buaField;

        return $this;
    }

    public function bindICBField(string $icbField): self
    {
        $this->icbField = $icbField;

        return $this;
    }

    public function bindCancerAllianceField(string $cancerAllianceField): self
    {
        $this->cancerAllianceField = $cancerAllianceField;

        return $this;
    }

    public function bindLSOA11Field(string $lsoa11Field): self
    {
        $this->lsoa11Field = $lsoa11Field;

        return $this;
    }

    public function bindMSOA11Field(string $msoa11Field): self
    {
        $this->msoa11Field = $msoa11Field;

        return $this;
    }

    public function bindLSOA21Field(string $lsoa21Field): self
    {
        $this->lsoa21Field = $lsoa21Field;

        return $this;
    }

    public function bindMSOA21Field(string $msoa21Field): self
    {
        $this->msoa21Field = $msoa21Field;

        return $this;
    }

    public function bindOA21Field(string $oa21Field): self
    {
        $this->oa21Field = $oa21Field;

        return $this;
    }

    public function bindRUC11Field(string $ruc11Field): self
    {
        $this->ruc11Field = $ruc11Field;

        return $this;
    }

    public function bindRUC21Field(string $ruc21Field): self
    {
        $this->ruc21Field = $ruc21Field;

        return $this;
    }

    public function bindLEP1Field(string $lep1Field): self
    {
        $this->lep1Field = $lep1Field;

        return $this;
    }

    public function bindLEP2Field(string $lep2Field): self
    {
        $this->lep2Field = $lep2Field;

        return $this;
    }
}
