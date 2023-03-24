<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'type' => 'hotel',
            'city_id' => 1,
            'building' => fake()->buildingNumber,
            'street' => fake()->streetName,
            'postcode' => fake()->postcode,
            'email' => fake()->email,
            'stars' => rand(1, 5),
            'image_1' => fake()->imageUrl,
            'image_2' => fake()->imageUrl,
            'image_3' => fake()->imageUrl,
            'description' => fake()->paragraph,
            'latitude' => fake()->latitude,
            'longitude' => fake()->longitude,
            'moderation' => 'approved'
        ];
    }
}
