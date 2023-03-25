<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i < 50; $i++){
            DB::table('apartments')->insert([
                'name' => $faker->name,
                'type' => 'hotel',
                'city_id' => rand(1,20),
                'building' => $faker->buildingNumber,
                'street' => $faker->streetName,
                'postcode' => $faker->postcode,
                'email' => $faker->email,
                'stars' => rand(1, 5),
                'image_1' => $faker->imageUrl,
                'image_2' => $faker->imageUrl,
                'image_3' => $faker->imageUrl,
                'description' => $faker->paragraph,
                'rate' => rand(1,10),
                'location' => rand(1,10),
                'staff' => rand(1,10),
                'clean' => rand(1,10),
                'comfort'=> rand(1,10),
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'moderation' => 'approved'
            ]);
        }

        $apartments = Apartment::all();

        foreach ($apartments as $apartment){
            Apartment::query()->where('id',$apartment->id)->update([
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
            ]);
        }
    }
}
