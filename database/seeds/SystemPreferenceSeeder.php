<?php

use Illuminate\Database\Seeder;

class SystemPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('system_preferences')->truncate();
        $preference=[
            ['name'=>'outgoing_email_address', 'value'=>''],
            ['name'=>'email_password', 'value'=>\Crypt::encrypt('Password')],
            ['name'=>'email_outgoing_server', 'value'=>''],
            ['name'=>'email_port', 'value'=>''],
            ['name'=>'email_encryption_type', 'value'=>'']
        ];
        
        DB::table('system_preferences')->insert($preference);
    }
}
