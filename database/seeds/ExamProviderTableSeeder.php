<?php

use Illuminate\Database\Seeder;

class ExamProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exam_providers')->truncate();
        \App\ExamProvider::insert([
            [
                'code' => 'JAMB',
                'name' => 'Joint Examination & Matriculation Board',
                'logo' => 'jamb.png'
            ],[
                'code' => 'NECO',
                'name' => 'National Examination Council',
                'logo' => 'neco.png'
            ],[
                'code' => 'WAEC',
                'name' => 'West African Examination Council',
                'logo' => 'waec.png'
            ],
        ]);
    }
}
