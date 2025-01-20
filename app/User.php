<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string name
 * @property string first_name
 * @property string last_name
 * @property string email
 */
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','id_role','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    public function Student()
    {
    	return $this->hasOne('App\Student','id');
    }

    // public function getNameAttribute(): string
    // {
    //     $first_name = $this->first_name;
    //     $last_name = $this->last_name;

    //     if (!$last_name) {
    //         return $first_name;
    //     }

    //     return $first_name . ' ' . $last_name;
    // }

    // public function setNameAttribute($name): void
    // {
    //     [$first_name, $last_name] = explode(' ', $name);

    //     $this->first_name = $first_name;
    //     $this->last_name = $last_name;
    // }
}
