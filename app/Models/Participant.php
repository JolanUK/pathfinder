<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participant extends Model
{
    /** @use HasFactory<\Database\Factories\ParticipantFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstName',
        'surname',
        'subjectPronoun',
        'objectPronoun',
        'email',
        'telephone',
        'address',
        'postcode',
        'quality',
        'eastings',
        'northings',
        'country',
        'nhs_ha',
        'longitude',
        'latitude',
        'european_electoral_region',
        'primary_care_trust',
        'region',
        'lsoa',
        'msoa',
        'incode',
        'outcode',
        'parliamentary_constituency',
        'parliamentary_constituency_2024',
        'admin_district',
        'parish',
        'admin_county',
        'date_of_introduction',
        'admin_ward',
        'ced',
        'ccg',
        'nuts',
        'pfa',
        'nhs_region',
        'ttwa',
        'national_park',
        'bua',
        'icb',
        'cancer_alliance',
        'lsoa11',
        'msoa11',
        'lsoa21',
        'msoa21',
        'oa21',
        'ruc11',
        'ruc21',
        'lep1',
        'lep2',
        'dob',
        'emergency_consent',
        'emergency_first_name',
        'emergency_surname',
        'emergency_relationship',
        'emergency_telephone',
        'referrer',
        'referrer_other',
        'disabilities',
        'difficulties',
        'ethnicity',
        'gender',
        'age',
        'declaration',
        'surveys',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
