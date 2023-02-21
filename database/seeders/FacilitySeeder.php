<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$facilities = [
            ['name'=> 'Парковка', 'icon'=>'parking'],
            ['name'=> 'WiFi', 'icon'=>'wifi'],
            ['name'=> 'Сімейні номери', 'icon'=>'human-male-female-child'],
            ['name'=> 'Номери для некурців', 'icon'=>'smoking-off'],
            ['name'=> 'Зручності для людей з обмеженими можливостями', 'icon'=>'wheelchair'],
            ['name'=> 'Обслуговування номерів', 'icon'=>'room-service-outline'],
            ['name'=> 'Чай/кава у номерах', 'icon'=>'coffee'],
            ['name'=> 'Ресторан', 'icon'=>'silverware-fork-knife'],
            ['name'=> 'Бар', 'icon'=>'glass-wine'],
            ['name'=> 'Ванна у номерах', 'icon'=>'shower'],
            ['name'=> 'Бассейн', 'icon'=>'pool'],
            ['name'=> 'Ігровий майданчик', 'icon'=>'seesaw'],
            ['name'=> 'Спа-зона', 'icon'=>'spa-outline'],
            ['name'=> 'Шумоізоляція', 'icon'=>'account-voice-off'],
            ['name'=> 'Міні-кухня', 'icon'=>'countertop-outline'],
            ['name'=> 'Холодильник у номерах', 'icon'=>'fridge-outline'],
        ];

        DB::table('facilities')->insert($facilities);*/

        $apartments = Apartment::all();

        foreach ($apartments as $item)
        {
            for ($i=0; $i<=7; $i++){
                $item->facilities()->attach(rand(1,16));
            }
        }
    }
}
