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
            'capacity' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

        DB::table('locations')->insert([
            'admin_id' => 1,
            'name' => 'Гнездо',
            'address' => 'Улица Македонија , Скопје',
            'description' => 'Кујна бар',
            'capacity' => 100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

        DB::table('locations')->insert([
            'admin_id' => 1,
            'name' => 'Ало Ако',
            'address' => 'Улица Македонија , Скопје',
            'description' => 'Кафе бар',
            'capacity' => 50,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Паб Комедија',
            'address' => 'Бул. Свети Климент Охридски, Скопје',
            'description' => 'бар',
            'capacity' => 60,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);


        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Каса Кубана',
            'address' => 'Кеј 13 Ноември , Скопје',
            'description' => 'Кубански ресторан & Коктел бар',
            'capacity' => 30,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);



        DB::table('locations')->insert([
            'admin_id' => 2,
            'name' => 'Рок кафана Рустикана',
            'address' => 'Булевар Илинден , Скопје',
            'description' => 'Рок бар',
            'capacity' => 80,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'rating'=> 5
        ]);

    }
}
