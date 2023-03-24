<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'apartment_id' => 1,
            'people' => rand(1,7),
            'number' => rand(10,1000),
            'floor' => rand(1,15),
            'cost' => rand(100,5000),
            'description' => fake()->sentence,
            'beds' => rand(1,5)
        ];
    }
}
