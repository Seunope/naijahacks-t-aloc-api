<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_flag', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->integer('question_id');
            $table->integer('question_number');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->string('answer');
            $table->string('solution');
            $table->string('exam_type');
            $table->string('exam_year');
            $table->timestamps();
        });

        Schema::create('question_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_flag_id');
            $table->string('comment');
            $table->integer('comment_by');
            $table->timestamps();
        });

        Schema::create('comment_on_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_comment_id');
            $table->string('comment');
            $table->integer('comment_by');;
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
        Schema::dropIfExists('question_flag');
        Schema::dropIfExists('question_comment');
        Schema::dropIfExists('comment_on_comment');

    }
}
