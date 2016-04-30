<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('histories',function($table){
            $table->increments('id');
            $table->integer('exam_id');
            $table->string('elapsed_time');
            $table->text('answers');
            $table->integer('user_id');
            $table->double('score');
            $table->integer('status');
            $table->timestamps();
            $table->softdeletes();
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
        Schema::drop('histories');
    }
}
