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

        /*for($i=0; $i<11; $i++) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->email,
                'email_verified_at' => $faker->dateTime,
                'password' => Hash::make('12345678'),
                'dob' => $faker->date,
                'phone' => $faker->phoneNumber,
                'nationality' => $faker->country
            ]);
        }
        DB::table('users')->insert([
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => 'admin@gmail.com',
            'email_verified_at' => $faker->dateTime,
            'password' => Hash::make('12345678'),
            'dob' => $faker->date,
            'phone' => $faker->phoneNumber,
            'nationality' => $faker->country,
            'is_admin' => true
        ]);*/

        $user = User::query()->findOrFail(13);
        $user->apartments()->attach(43);
        $user->apartments()->attach(4);
    }
}
