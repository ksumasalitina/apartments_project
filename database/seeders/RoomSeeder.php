<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i < 200; $i++) {
            DB::table('rooms')->insert([
                'apartment_id' => rand(1,50),
                'people' => rand(1,7),
                'number' => rand(10,1000),
                'floor' => rand(1,15),
                'cost' => rand(100,5000),
                'description' => $faker->sentence,
                'beds' => rand(1,5)
            ]);
        }
    }
}
