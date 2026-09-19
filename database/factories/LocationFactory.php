<?php

namespace Database\Factories;

use App\Faker\PostcodeProvider;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Location>
 */
class LocationFactory extends Factory
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
            'title' => $this->faker->word(),
            'excerpt' => $this->faker->sentence(),
            'maximum_participants' => $this->faker->randomNumber(),

            'postcode' => $postcodeData['postcode'],
            'latitude' => $postcodeData['latitude'] ?? null,
            'longitude' => $postcodeData['longitude'] ?? null,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
