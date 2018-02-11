<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('locations')->insert([
            'admin_id' => 1,
            'name' => 'Јавна Соба',
            'address' => '50-та Девизија 24, Скопје',
            'description' => 'Мезе бар',
            'capacity' => 6,
            'contact' => "076123456",
            'image' => "lokal-1.svg" ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);



        DB::table('locations')->insert([
            'admin_id' => 1,
            'name' => 'Гнездо',
            'address' => 'Улица Македонија , Скопје',
            'description' => 'Кујна бар',
            'capacity' => 6,
            'image' => "lokal-2.svg" ,
            'contact' => "076123789",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

        DB::table('locations')->insert([
            'admin_id' => 1,
            'name' => 'Ало Ако',
            'address' => 'Улица Македонија , Скопје',
            'description' => 'Кафе бар',
            'capacity' => 6,
            'contact' => "076789456",
            'image' => "lokal-3.svg" ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Паб Комедија',
            'address' => 'Бул. Свети Климент Охридски, Скопје',
            'description' => 'бар',
            'image' => "lokal-4.svg" ,
            'contact' => "076123741",
            'capacity' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);


        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Каса Кубана',
            'address' => 'Кеј 13 Ноември , Скопје',
            'description' => 'Кубански ресторан & Коктел бар',
            'capacity' => 6,
            'image' => "lokal-5.svg" ,
            'contact' => "076123745",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);



        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Рок кафана Рустикана',
            'address' => 'Булевар Илинден , Скопје',
            'description' => 'Рок бар',
            'contact' => "076123963",
            'capacity' => 6,
            'image' => "lokal-6.svg" ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

    }
}
