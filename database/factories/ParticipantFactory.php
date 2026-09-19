<?php

namespace Database\Factories;

use App\Enums\AgeRanges;
use App\Enums\Ethnicities;
use App\Enums\Genders;
use App\Enums\ObjectPronouns;
use App\Enums\Referrers;
use App\Enums\SubjectPronouns;
use App\Enums\YesNo;
use App\Faker\PostcodeProvider;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Participant>
 */
class ParticipantFactory extends Factory
{
    private PostcodeProvider $postcodeProvider;

    public function __construct()
    {
        parent::__construct();
        $this->faker->addProvider(new PostcodeProvider($this->faker));
        $this->postcodeProvider = new PostcodeProvider($this->faker);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $postcodeData = $this->postcodeProvider->fullPostcodeData();

        return [
            'user_id' => User::all()->random()->id,
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'subject_pronoun' => $this->faker->randomElement(SubjectPronouns::cases())->value,
            'object_pronoun' => $this->faker->randomElement(ObjectPronouns::cases())->value,
            'telephone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),

            'postcode' => $postcodeData['postcode'],
            'quality' => $postcodeData['quality'] ?? null,
            'eastings' => $postcodeData['eastings'] ?? null,
            'northings' => $postcodeData['northings'] ?? null,
            'country' => $postcodeData['country'] ?? null,
            'nhs_ha' => $postcodeData['nhs_ha'] ?? null,
            'longitude' => $postcodeData['longitude'] ?? null,
            'latitude' => $postcodeData['latitude'] ?? null,
            'european_electoral_region' => $postcodeData['european_electoral_region'] ?? null,
            'primary_care_trust' => $postcodeData['primary_care_trust'] ?? null,
            'region' => $postcodeData['region'] ?? null,
            'lsoa' => $postcodeData['lsoa'] ?? null,
            'msoa' => $postcodeData['msoa'] ?? null,
            'incode' => $postcodeData['incode'] ?? null,
            'outcode' => $postcodeData['outcode'] ?? null,
            'parliamentary_constituency' => $postcodeData['parliamentary_constituency'] ?? null,
            'parliamentary_constituency_2024' => $postcodeData['parliamentary_constituency_2024'] ?? null,
            'admin_district' => $postcodeData['admin_district'] ?? null,
            'parish' => $postcodeData['parish'] ?? null,
            'admin_county' => $postcodeData['admin_county'] ?? null,
            'date_of_introduction' => $postcodeData['date_of_introduction'] ?? null,
            'admin_ward' => $postcodeData['admin_ward'] ?? null,
            'ced' => $postcodeData['ced'] ?? null,
            'ccg' => $postcodeData['ccg'] ?? null,
            'nuts' => $postcodeData['nuts'] ?? null,
            'pfa' => $postcodeData['pfa'] ?? null,
            'nhs_region' => $postcodeData['nhs_region'] ?? null,
            'ttwa' => $postcodeData['ttwa'] ?? null,
            'national_park' => $postcodeData['national_park'] ?? null,
            'bua' => $postcodeData['bua'] ?? null,
            'icb' => $postcodeData['icb'] ?? null,
            'cancer_alliance' => $postcodeData['cancer_alliance'] ?? null,
            'lsoa11' => $postcodeData['lsoa11'] ?? null,
            'msoa11' => $postcodeData['msoa11'] ?? null,
            'lsoa21' => $postcodeData['lsoa21'] ?? null,
            'msoa21' => $postcodeData['msoa21'] ?? null,
            'oa21' => $postcodeData['oa21'] ?? null,
            'ruc11' => $postcodeData['ruc11'] ?? null,
            'ruc21' => $postcodeData['ruc21'] ?? null,
            'lep1' => $postcodeData['lep1'] ?? null,
            'lep2' => $postcodeData['lep2'] ?? null,

            'dob' => $this->faker->dateTimeThisCentury(),
            'emergency_consent' => $this->faker->randomElement(YesNo::cases())->value,
            'emergency_first_name' => $this->faker->firstName(),
            'emergency_surname' => $this->faker->lastName(),
            'emergency_relationship' => $this->faker->sentence(),
            'emergency_telephone' => $this->faker->phoneNumber(),
            'referrer' => $this->faker->randomElement(Referrers::cases())->value,
            'referrer_other' => $this->faker->sentence(),
            'disabilities' => $this->faker->randomElement(YesNo::cases())->value,
            'difficulties' => $this->faker->sentence(),
            'ethnicity' => $this->faker->randomElement(Ethnicities::cases())->value,
            'gender' => $this->faker->randomElement(Genders::cases())->value,
            'age' => $this->faker->randomElement(AgeRanges::cases())->value,
            'declaration' => 1,
            'surveys' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
