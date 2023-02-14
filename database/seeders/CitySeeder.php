<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('city'=>'Харків'),
            array('city'=>'Київ'),
            array('city'=>'Одеса'),
            array('city'=>'Дніпро'),
            array('city'=>'Запоріжжя'),
            array('city'=>'Кривий Ріг'),
            array('city'=>'Житомир'),
            array('city'=>'Львів'),
            array('city'=>'Чернівці'),
            array('city'=>'Тернопіль'),
            array('city'=>'Івано-Франківськ'),
            array('city'=>'Луцьк'),
            array('city'=>'Вінниця'),
            array('city'=>'Ужгород'),
            array('city'=>'Суми'),
            array('city'=>'Полтава'),
            array('city'=>'Чернігів'),
            array('city'=>'Черкаси'),
            array('city'=>'Миколаїв'),
            array('city'=>'Хмельницький')
        );

        DB::table('cities')->insert($cities);
    }
}
