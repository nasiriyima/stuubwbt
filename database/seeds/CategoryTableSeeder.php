<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->truncate();
        \App\Category::insert([
            [
                'code' => 'CORE',
                'name' => 'Core',
            ],[
                'code' => 'COMM',
                'name' => 'Commercials',
            ],[
                'code' => 'SCI',
                'name' => 'Sciences',
            ],[
                'code' => 'ART',
                'name' => 'ART',
            ],
        ]);
    }
}
