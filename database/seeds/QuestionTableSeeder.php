<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->truncate();
        \App\Question::insert([
            [
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 6,
                'average_time' => '0:2',
                
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 6,
                'average_time' => '0:2',
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 6,
                'average_time' => '0:2',
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 6,
                'average_time' => '0:2',
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 6,
                'average_time' => '0:2',
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 1,
                'average_time' => '0:2',
            ],[
                'code' => 'MATH',
                'name' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'exam_id' => 1,
                'average_time' => '0:2',
            ],
        ]);
    }
}
