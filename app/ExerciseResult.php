<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExerciseResult extends Model
{
    //
    protected $table = 'exercise_results';

    protected $fillable = [
        'id_exercise_commit',
        'score',
        'grade',
        'id_knowledge_level',
        'id_misconception',
        'timer',
        'misconception_ml'
    ];


    public function knowledge_level () {
        return $this->hasOne('App\KnowledgeLevel', 'id' , 'id_knowledge_level');
    }

    public function misconception () {
        return $this->hasOne('App\Misconception', 'id', 'id_misconception');
    }
}
