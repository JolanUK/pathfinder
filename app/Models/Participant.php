<?php

namespace App\Models;

use Carbon\Carbon;
use Database\Factories\ParticipantFactory;
use EduardoRibeiroDev\FilamentLeaflet\ValueObjects\Coordinate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Participant extends Model
{
    /** @use HasFactory<ParticipantFactory> */
    use HasFactory;

    protected $appends = ['active_participant', 'surname_initial'];

    protected $fillable = [
        'user_id',
        'first_name',
        'surname',
        'subject_pronoun',
        'object_pronoun',
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

    public function age()
    {
        if (isset($this->attributes['dob'])) {
            return Carbon::parse($this->attributes['dob'])->age;
        }
    }

    // Active and archived enrolments
    public function activeEnrolments(): HasMany
    {
        // Is the current user registered as a participant in the current term?
        $term = config('global.currentTerm');

        $user = $this->user_id;

        return $this->hasMany(Enrolment::class, 'user_id', 'user_id');
        // ->where('term_id', $term);
    }

    public function archivedEnrolments(): HasMany
    {
        // Is the current user registered as a participant in the current term?
        $term = config('global.currentTerm');
        $user = $this->user_id;

        return $this->hasMany(Enrolment::class, 'user_id');
        // ->whereNot('term_id', $term);
    }

    public function activeAttendances(): HasManyThrough
    {
        // Is the current user registered as a participant in the current term?
        $term = config('global.currentTerm');
        $user = $this->user_id;

        return $this->hasManyThrough(
            Attendance::class,
            Enrolment::class,
            'user_id',
            'enrolment_id',
            'id',
            'id'
        );
    }

    public function infractions(): HasMany
    {
        return $this->hasMany(Infraction::class);
    }

    // Attributes
    public function getFullNameAttribute()
    {
        // Format: [first name] [last name]
        if (! empty($this->first_name) and ! empty($this->surname)) {
            return $this->first_name.' '.$this->surname ?? '';
        }
    }

    public function getSurnameInitialAttribute()
    {
        if (! empty($this->surname)) {
            return mb_substr($this->surname, 0, 1);
        }

        return null;
    }

    public function getActiveParticipantAttribute()
    {
        if ($this->activeEnrolments && $this->activeEnrolments()->exists()) {
            return 'active';
        }

        return 'inactive';
    }

    // Scoping
    public function scopeOrderBySurnameInitial($query, $direction = 'asc')
    {
        return $query->orderBy('surname', $direction);
    }

    protected $casts = [
        'referrer' => 'array',
        'location' => Coordinate::class,
    ];
}
