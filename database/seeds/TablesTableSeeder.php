<?php

use App\Table;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($event_id = 1; $event_id <= 8; $event_id++) {

            for ($i = 0; $i < 10; $i++) {
                DB::table('tables')->insert([
                    'event_id' => $event_id,
                    'user_id' => 0,
                    'reserved' => false,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }

        $tables = Table::all()->take(60);

        foreach ($tables as $table) {
            $table->reserved = true;

            if ($table->id < 20) {
                $table->user_id = 1;
            } elseif ($table->id > 20 && $table->id < 40) {

                $table->user_id = 2;
            } else {

                $table->user_id = 3;

            }
            $table->save();

        }
    }
}
