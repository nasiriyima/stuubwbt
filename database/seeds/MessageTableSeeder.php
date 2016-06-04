<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('messages')->truncate();
        \App\Message::insert([
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 1,
                'deleted_at' => \Carbon\Carbon::now(),
            ],
        ]);
        \App\Message::insert([
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 0,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 0,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 1,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 2,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 3,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 4,
            ],
            [
                'subject' => 'Lorem Ipsum is simply dummy text of the printing',
                'body' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s consectetur adipisicing elit',
                'receiver_id' => 1,
                'sender_id' => 1,
                'status' => 1,
            ],
        ]);
    }
}
