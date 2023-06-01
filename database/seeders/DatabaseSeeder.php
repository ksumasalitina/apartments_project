<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Apartment;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ApartmentSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(FavoriteSeeder::class);
    }
}
