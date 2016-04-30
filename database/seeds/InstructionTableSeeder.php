<?php

use Illuminate\Database\Seeder;

class InstructionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('instructions')->truncate();
        \App\Instruction::insert([
            [
                'title' => 'Exam Instructions',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
            ],
        ]);
    }
}