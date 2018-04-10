<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionanswers', function (Blueprint $table) {
            $table->increments('quest_answer_id');

            $table->integer('quest_id')->unsigned();
            $table->foreign('quest_id')->references('q_id')->on('questions')->onDelete('cascade');

            $table->string('ans_name');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questionanswers');
    }
}
