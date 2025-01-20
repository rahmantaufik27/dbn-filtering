<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExerciseResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_topic');
            $table->integer('id_student');
            $table->integer('id_exercise_commit');
            $table->integer('id_knowledge_level');
            $table->integer('id_rule_of_bug');
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
        Schema::dropIfExists('exercise_results');
    }
}
