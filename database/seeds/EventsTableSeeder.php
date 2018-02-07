<?php

use App\Event;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => 'ФИНКИ Студентска забава',
            'from' => Carbon::now()->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->format('Y-m-d H:i:s'),
            'price' => 100,
            'location_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')


        ]);

        DB::table('events')->insert([
            'name' => 'DJ AgainstU',
            'from' => Carbon::now()->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);


        DB::table('events')->insert([
            'name' => 'Каролина Гочева',
            'from' => Carbon::now()->addWeeks(1)->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addWeeks(1)->format('Y-m-d H:i:s'),
            'price' => 50,
            'location_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);



        DB::table('events')->insert([
            'name' => 'Маскенбал',
            'from' => Carbon::now()->addWeeks(2)->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addWeeks(2)->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('events')->insert([
            'name' => 'Забава во бело',
            'from' => Carbon::now()->addWeeks(3)->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addWeeks(3)->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 4,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('events')->insert([
            'name' => 'After work',
            'from' => Carbon::now()->addMonth()->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addMonth()->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('events')->insert([
            'name' => 'Бекдор бенд',
            'from' => Carbon::now()->addMonth(2)->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addMonth(2)->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 5,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('events')->insert([
            'name' => 'Фолтин',
            'from' => Carbon::now()->addMonth(2)->format('Y-m-d H:i:s'),
            'to' => Carbon::now()->addMonth(2)->format('Y-m-d H:i:s'),
            'price' => 0,
            'location_id' => 6,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);


    }
}
