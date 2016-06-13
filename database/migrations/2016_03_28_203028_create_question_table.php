<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('questions',function($table){
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->integer('exam_id');
            $table->integer('average_time');
            $table->timestamps();
            $table->softdeletes();
        });
        
        Schema::create('question_additional_informations',function($table){
            $table->increments('id');
            $table->text('name');
            $table->integer('information_type_id');
            $table->text('description');
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
        Schema::drop('questions');
        Schema::drop('question_additional_informations');
    }
}
