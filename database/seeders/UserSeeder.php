<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<11; $i++) {
            DB::table('users')->insert([
                /*'id' => $i+1,*/
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'email_verified_at' => $faker->dateTime,
                'password' => Hash::make('12345678'),
                'dob' => $faker->date,
                'phone' => $faker->phoneNumber,
                'nationality' => $faker->country,
                'is_companion' => 1,
                'message' => $faker->sentence
            ]);
        }

        /*DB::table('users')->insert([
            'id' => 12,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => 'kseniia@gmail.com',
            'email_verified_at' => $faker->dateTime,
            'password' => Hash::make('12345678'),
            'dob' => $faker->date,
            'phone' => $faker->phoneNumber,
            'nationality' => $faker->country,
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => 'admin@gmail.com',
            'email_verified_at' => $faker->dateTime,
            'password' => Hash::make('12345678'),
            'dob' => $faker->date,
            'phone' => $faker->phoneNumber,
            'nationality' => $faker->country,
            'is_admin' => false
        ]);*/


    }
}
