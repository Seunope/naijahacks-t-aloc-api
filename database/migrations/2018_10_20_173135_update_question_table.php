<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        if (Schema::hasColumn('question_flag', 'solution')) {
//            Schema::table('question_flag', function (Blueprint $table) {
//                $table->string('solution')->nullable()->change();
//            });
//        }

        Schema::table('question_flag', function (Blueprint $table) {
            $table->string('subject');
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
    }
}
