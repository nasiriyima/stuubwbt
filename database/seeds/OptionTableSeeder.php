<?php

use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('options')->truncate();
        \App\Option::insert([
            [
                'name' => 'Simply dummy text of the printing',
                'question_id' => 1,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 1,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 1,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 1,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 2,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 2,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 2,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 2,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 3,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 3,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 3,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 3,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 4,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 4,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 4,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 4,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 5,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 5,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 5,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 5,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 6,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 6,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 6,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 6,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 7,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 7,
                'status' => 1,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 7,
                'status' => 0,
            ],[
                'name' => 'Simply dummy text of the printing',
                'question_id' => 7,
                'status' => 0,
            ],
        ]);
    }
}
