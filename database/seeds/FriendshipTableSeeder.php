<?php

use Illuminate\Database\Seeder;

class FriendshipTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('friendships')->truncate();
        \App\Friendship::insert([
            'user_id' => 1,
            'friend_id' => 2,
            'message' => 'Default friendship request message',
            'status' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
