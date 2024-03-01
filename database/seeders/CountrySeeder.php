<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = file_get_contents(storage_path('../database/seeders/data/countries.json'));
        $data = json_decode($data, true);

        foreach ($data as $item) {
            Country::create([
                'name' => $item['name'],
                'icon' => $item['unicode']
            ]);
        }
    }
}
