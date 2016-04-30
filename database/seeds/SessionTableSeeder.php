<?php

use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sessions')->truncate();
        \App\Session::insert([
            [
                'code' => '2000-2001',
                'name' => '2000/2001',
            ],[
                'code' => '2001-2002',
                'name' => '2001/2002',
            ],[
                'code' => '2002-2003',
                'name' => '2002/2003',
            ],[
                'code' => '2003-2004',
                'name' => '2003/2004',
            ],
        ]);
    }
}
