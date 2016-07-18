<?php

use Illuminate\Database\Seeder;

class InformationTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('information_types')->truncate();

        $informaitonType = new \App\InformationType();
        $informaitonType->name = 'image';
        $informaitonType->function = 'image';
        $informaitonType->save();

        $informaitonType1 = new \App\InformationType();
        $informaitonType1->name = 'text';
        $informaitonType1->function = 'text';
        $informaitonType1->save();
    }
}
