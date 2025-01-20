<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Student as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user','name','nis', 'class','id_knowledge_level','id_question_type','id_misconception'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];
    public function user()
    {
    	return $this->belongsTo('App\User','id_user');
    }


    public function exercise_commit () {
        return $this->hasMany('App\ExerciseCommit', 'id_student', 'id_user');
    }
}
