<?php

namespace Database\Factories;

use App\Enums\CourseTypes;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_type' => $this->faker->randomElement(CourseTypes::cases())->name,
            'title' => $this->faker->word(),
            'excerpt' => $this->faker->sentence(),
            'minimum_participants' => $this->faker->randomNumber(),
            'maximum_participants' => $this->faker->randomNumber(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
