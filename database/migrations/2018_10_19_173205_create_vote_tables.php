<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_flag_id');
            $table->integer('up_vote');
            $table->integer('down_vote');;
            $table->timestamps();
        });

        Schema::create('vote_tracker', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vote_id');
            $table->integer('vote_by');
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
        Schema::dropIfExists('vote');
        Schema::dropIfExists('vote_tracker');
    }
}