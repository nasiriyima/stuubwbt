<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('exams',function($table){
            $table->increments('id');
            $table->integer('subject_id');
            $table->integer('month_id');
            $table->integer('session_id');
            $table->string('time_allowed');
            $table->integer('instruction_id');
            $table->integer('exam_provider_id');
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
        Schema::drop('exams');
    }
}
