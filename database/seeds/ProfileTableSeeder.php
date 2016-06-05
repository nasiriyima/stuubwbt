<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->truncate();
        \App\Profile::insert([
            'user_id' => 1,
            'description' => 'default description',
            'phone' => 1,
            'email' => 'dev@nasiriyima.com',
            'address' => 1,
            'social_contact' => '{
                "twitter":{
                    "icon":"rounded-x tw fa fa-twitter",
                    "name":"amina.mustapha","address":"#"
                 },
                 "facebook":{
                    "icon":"rounded-x fb fa fa-facebook",
                    "name":"Amina Mustapha",
                    "address":"#"
                 }
            }',
            'school_id' => 0,
            'image' => 'default_logo.jpg',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
