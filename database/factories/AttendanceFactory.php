<?php

namespace Database\Factories;

use App\Enums\AttendanceStatuses;
use App\Models\Attendance;
use App\Models\Enrolment;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'enrolment_id' => Enrolment::all()->random()->id,
            'module_id' => Module::all()->random()->id,
            'status' => $this->faker->randomElement(AttendanceStatuses::cases())->name,
            'status_reason' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
