<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comments')->insert([
            'body' => 'Одлично место ! Препорачувам',
            'location_id' => 1,
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('comments')->insert([
            'body' => 'Супер место за забава и дружење',
            'location_id' => 1,
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);


        DB::table('comments')->insert([
            'body' => 'Лошо ! Персоналот не беше услужлив',
            'location_id' => 2,
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('comments')->insert([
            'body' => 'Нарачките доцнеа и јадењето беше ладно',
            'location_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('comments')->insert([
        'body' => 'Едноставно најдобри!',
        'location_id' => 4,
        'user_id' => 2,
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

    ]);

        DB::table('comments')->insert([
            'body' => 'Најдобар локал во градот!',
            'location_id' => 6,
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('comments')->insert([
            'body' => 'Секогаш пуштаат убава латино музика.',
            'location_id' => 5,
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ]);

    }
}
