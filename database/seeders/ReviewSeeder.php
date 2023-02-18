<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=100; $i++){
            DB::table('reviews')->insert([
                'user_id' => rand(1,11),
                'apartment_id' => rand(1,50),
                'title' => $faker->sentence,
                'comment' => $faker->paragraph,
                'rate' => rand(1,10),
                'clean' => rand(1,10),
                'comfort' => rand(1,10),
                'staff' => rand(1,10),
                'location' => rand(1,10)
            ]);
        }
    }
}
