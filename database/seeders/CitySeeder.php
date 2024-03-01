<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Street;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var City $city */
        $city = City::create(['name' => 'Черкаси']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Cherkasy.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Чернігів']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Chernihiv.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Івано-Франківськ']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Ivano-Frankivsk.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Харків']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Kharkiv.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Хмельницький']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Khmelnitsky.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Кіровоград']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Kirovohrad.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Київ']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Kyiv.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Луцьк']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Lutsk.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Львів']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Lviv.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Миколаїв']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Mykolaiv.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Одеса']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Odesa.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Полтава']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Poltava.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Тернопіль']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Ternopil.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Ужгород']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Uzhgorod.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Вінниця']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Vinnytsia.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }

        $city = City::create(['name' => 'Житомир']);
        $data = file_get_contents(storage_path('../database/seeders/data/cities/Zhytomyr.json'));

        foreach (json_decode($data, true) as $street) {
            $city->streets()->create(['name' => $street['street_type'] . ' ' . $street['name']]);
        }
    }
}
