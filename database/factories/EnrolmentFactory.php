<?php

namespace Database\Factories;

use App\Enums\EnrolmentStatuses;
use App\Enums\EnrolmentTypes;
use App\Enums\Objectives;
use App\Models\Enrolment;
use App\Models\Participant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Enrolment>
 */
class EnrolmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => Participant::all()->random()->id,
            'enrolment_type' => $this->faker->randomElement(EnrolmentTypes::cases())->name,
            'objectives' => $this->faker->randomElement(Objectives::cases())->value,
            'objectives_other' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(EnrolmentStatuses::cases())->name,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
