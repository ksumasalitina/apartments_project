<?php

namespace Database\Factories;

use App\Data\ApartmentTypes;
use App\Data\FacilityTypes;
use App\Data\ModerationStatuses;
use App\Models\Street;
use App\ValueObjects\ApartmentRateVO;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

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
        $images = [];
        $facilities = [];

        foreach (range(1,5) as $item) {
            $images[] = $this->faker->imageUrl;
            $facilities[] = $this->faker->randomElement(array_column(FacilityTypes::cases(), 'value'));
        }

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(10),
            'type' => $this->faker->randomElement(array_column(ApartmentTypes::cases(), 'value')),
            'building' => random_int(1, 100),
            'street_id' => Street::query()->inRandomOrder()->first()->id,
            'stars' => random_int(1, 5),
            'moderation_status' => $this->faker->randomElement(array_column(ModerationStatuses::cases(), 'value')),
            'images' => $images,
            'facilities' => $facilities,
            'rate' => (new ApartmentRateVO(random_int(1, 10), random_int(1, 10), random_int(1, 10), random_int(1, 10), random_int(1, 10)))->toArray()
        ];
    }
}
