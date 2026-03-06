<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('firstName')->nullable();
            $table->string('surname')->nullable();
            $table->string('subjectPronoun')->nullable();
            $table->string('objectPronoun')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->longText('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('quality')->nullable();
            $table->string('eastings')->nullable();
            $table->string('northings')->nullable();
            $table->string('country')->nullable();
            $table->string('nhs_ha')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('european_electoral_region')->nullable();
            $table->string('primary_care_trust')->nullable();
            $table->string('region')->nullable();
            $table->string('lsoa')->nullable();
            $table->string('msoa')->nullable();
            $table->string('incode')->nullable();
            $table->string('outcode')->nullable();
            $table->string('parliamentary_constituency')->nullable();
            $table->string('parliamentary_constituency_2024')->nullable();
            $table->string('admin_district')->nullable();
            $table->string('parish')->nullable();
            $table->string('admin_county')->nullable();
            $table->string('date_of_introduction')->nullable();
            $table->string('admin_ward')->nullable();
            $table->string('ced')->nullable();
            $table->string('ccg')->nullable();
            $table->string('nuts')->nullable();
            $table->string('pfa')->nullable();
            $table->string('nhs_region')->nullable();
            $table->string('ttwa')->nullable();
            $table->string('national_park')->nullable();
            $table->string('bua')->nullable();
            $table->string('icb')->nullable();
            $table->string('cancer_alliance')->nullable();
            $table->string('lsoa11')->nullable();
            $table->string('msoa11')->nullable();
            $table->string('lsoa21')->nullable();
            $table->string('msoa21')->nullable();
            $table->string('oa21')->nullable();
            $table->string('ruc11')->nullable();
            $table->string('ruc21')->nullable();
            $table->string('lep1')->nullable();
            $table->string('lep2')->nullable();
            $table->date('dob')->nullable();
            $table->boolean('emergencyConsent')->nullable();
            $table->string('emergencyFirstName')->nullable();
            $table->string('emergencySurname')->nullable();
            $table->string('emergencyRelationship')->nullable();
            $table->string('emergencyTelephone')->nullable();
            $table->json('referrer')->nullable();
            $table->string('referrerOther')->nullable();
            $table->string('disabilities')->nullable();
            $table->string('difficulties')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->boolean('declaration')->nullable();
            $table->boolean('surveys')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
