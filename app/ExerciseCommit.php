<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseCommit extends Model
{
    
    protected $table = 'exercise_commits';

    protected $fillable = [
        'id_question_package',
        'id_student',
        'attempt',
    ];

    public function exercise_per_question () {
        return $this->hasMany('App\ExercisePerQuestion', 'id_exercise_commit');
    }

    public function exercise_result () {
        return $this->hasOne('App\ExerciseResult', 'id_exercise_commit');
    }
}
