<?php

use Illuminate\Database\Seeder;

class ExamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exams')->truncate();
        \App\Exam::insert([
            [
                'subject_id' => 1,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 1,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 1,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 2,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 2,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 2,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 3,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 3,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 3,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 5,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 5,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 5,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 6,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 6,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 6,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 7,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 7,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 7,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 14,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 14,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 14,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 15,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 15,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 15,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 21,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 21,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 2,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 21,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 22,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 22,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 22,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],[
                'subject_id' => 23,
                'month_id' => 6,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 1,
                'status' => 1,
            ],[
                'subject_id' => 23,
                'month_id' => 2,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 2,
                'status' => 1,
            ],[
                'subject_id' => 23,
                'month_id' => 1,
                'session_id' => 1,
                'time_allowed' => '2:30',
                'instruction_id' => 1,
                'exam_provider_id' => 3,
                'status' => 1,
            ],
        ]);
    }
}
