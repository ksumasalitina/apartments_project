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
            array('id'=> 1,'city'=>'Харків'),
            array('id'=> 2,'city'=>'Київ'),
            array('id'=> 3,'city'=>'Одеса'),
            array('id'=> 4,'city'=>'Дніпро'),
            array('id'=> 5,'city'=>'Запоріжжя'),
            array('id'=> 6,'city'=>'Кривий Ріг'),
            array('id'=> 7,'city'=>'Житомир'),
            array('id'=> 8,'city'=>'Львів'),
            array('id'=> 9,'city'=>'Чернівці'),
            array('id'=> 10,'city'=>'Тернопіль'),
            array('id'=> 11,'city'=>'Івано-Франківськ'),
            array('id'=> 12,'city'=>'Луцьк'),
            array('id'=> 13,'city'=>'Вінниця'),
            array('id'=> 14,'city'=>'Ужгород'),
            array('id'=> 15,'city'=>'Суми'),
            array('id'=> 16,'city'=>'Полтава'),
            array('id'=> 17,'city'=>'Чернігів'),
            array('id'=> 18,'city'=>'Черкаси'),
            array('id'=> 19,'city'=>'Миколаїв'),
            array('id'=> 20,'city'=>'Хмельницький')
        );

        DB::table('cities')->insert($cities);
    }
}
