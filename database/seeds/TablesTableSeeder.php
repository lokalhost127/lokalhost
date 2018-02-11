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

            for ($i = 0; $i < 6; $i++) {
                DB::table('tables')->insert([
                    'event_id' => $event_id,
                    'user_id' => 0,
                    'reserved' => false,
                    'value' => 0,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }

        $table1 = Table::where("id", 1)->first();
        $table2 = Table::where("id", 7)->first();
        $table3 = Table::where("id", 13)->first();

        $table1->reserved = true;
        $table1->value = 1;
        $table1->user_id = 1;

        $table2->reserved = true;
        $table2->value = 1;
        $table2->user_id = 2;

        $table3->reserved = true;
        $table3->value = 1;
        $table3->user_id = 3;

        $table1->save();
        $table2->save();
        $table3->save();

    }
}
