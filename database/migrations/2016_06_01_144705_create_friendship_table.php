<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriendshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('friendships', function(Blueprint $table){
            $table->increments('id');
            $table->integer('user_id')->nullable();
            $table->integer('friend_id')->nullable();
            $table->text('message')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('friendships');
    }
}
