<?php

use Illuminate\Database\Seeder;

class MonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('months')->truncate();
        \App\Month::insert([
            [
                'code' => 'MAY-JUNE',
                'name' => 'May/June',
                'exam_provider_id' => 3
            ],[
                'code' => 'JUNE-JULY',
                'name' => 'June/July',
                'exam_provider_id' => 2
            ],[
                'code' => 'NOV-DEC',
                'name' => 'November/December',
                'exam_provider_id' => 3
            ],[
                'code' => 'OCT-NOV',
                'name' => 'October/November',
                'exam_provider_id' => 2
            ],[
                'code' => 'MAR',
                'name' => 'March',
                'exam_provider_id' => 1
            ],[
                'code' => 'APR',
                'name' => 'April',
                'exam_provider_id' => 1
            ],
        ]);
    }
}
