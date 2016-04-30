<?php

use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->truncate();
        \App\Subject::insert([
            [
                'code' => 'MATH',
                'name' => 'Mathematics',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 1,
            ],[
                'code' => 'ENG',
                'name' => 'English',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 1,
            ],[
                'code' => 'FINE-ART',
                'name' => 'Visual Arts',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'F-MATHS',
                'name' => 'Further Mathematics',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'PHY',
                'name' => 'Physics',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'CHEM',
                'name' => 'Chemistry',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'BIO',
                'name' => 'Biology',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'HIST',
                'name' => 'History',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'AGRIC',
                'name' => 'Agriculture',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'TECH-DRW',
                'name' => 'Technical Drawing',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 3,
            ],[
                'code' => 'LIT',
                'name' => 'Literature',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'FRE',
                'name' => 'French',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'ECONS',
                'name' => 'Economics',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 2,
            ],[
                'code' => 'GEO',
                'name' => 'Geography',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 2,
            ],[
                'code' => 'HAUSA',
                'name' => 'Hausa',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'IGBO',
                'name' => 'Igbo',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'YORUBA',
                'name' => 'Yoruba',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'F&N',
                'name' => 'Food & Nuitrition',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'HOME-ECONS',
                'name' => 'Home Economics',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 4,
            ],[
                'code' => 'GOV',
                'name' => 'Government',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 2,
            ],[
                'code' => 'COMM',
                'name' => 'Commerce',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 2,
            ],[
                'code' => 'ACCT',
                'name' => 'Accounting',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s',
                'category_id' => 2,
            ],
        ]);
    }
}
