<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseranswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useranswers', function (Blueprint $table) {
              $table->increments('user_ans_id');
              $table->integer('est_id')->unsigned();
$table->foreign('est_id')->references('est_id')->on('estebyans')->onDelete('cascade');

              $table->integer('quest_id')->unsigned();
                $table->foreign('quest_id')->references('q_id')->on('questions')->onDelete('cascade');

              $table->string('answer_name');
              $table->string('user_name');
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
        Schema::drop('useranswers');
    }
}
