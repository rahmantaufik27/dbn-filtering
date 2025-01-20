<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExercisePerQuestion extends Model
{
    protected $table = 'exercises_per_questions';

    protected $fillable = [
        'id_exercise_commit',
        'id_question_type',
        'correctness',
        'misconceptions',
        'timer'
    ];
}
