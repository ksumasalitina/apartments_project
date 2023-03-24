<?php

namespace Tests\Feature;

use App\Models\Apartment;
use App\Models\Room;
use Database\Seeders\CitySeeder;
use Tests\TestCase;

class ApartmentSearchTest extends TestCase
{
    public function test_apartment_search_successful()
    {
        $apartment = Apartment::factory()->create();
        Room::factory(3)->create(['apartment_id' => $apartment->id]);
        $params = [
            'city' => $apartment->city_id,
            'startDate' => fake()->date,
            'endDate' => fake()->date,
            'people' => 1
        ];

        $response = $this->get(route('find',$params));

        $response->assertStatus(200);
        $response->assertViewIs('apartments.find');
        $response->assertSee($apartment->name);
    }

    public function test_apartment_search_invalid()
    {
        $apartment = Apartment::factory()->create();
        Room::factory(3)->create(['apartment_id' => $apartment->id]);
        $params = [
            'city' => $apartment->city_id,
            'startDate' => '',
            'endDate' => fake()->date,
            'people' => 1
        ];

        $response = $this->get(route('find',$params));

        $response->assertStatus(302);
        $response->assertInvalid(['startDate']);
    }

    public function test_apartment_not_found()
    {
        $params = [
            'city' => 1,
            'startDate' => fake()->date,
            'endDate' => fake()->date,
            'people' => 1
        ];

        $response = $this->get(route('find',$params));

        $response->assertStatus(200);
        $response->assertViewIs('apartments.find');
        $response->assertSee('нічого не знайдено');
    }
}
