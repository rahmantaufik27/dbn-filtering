<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misconception extends Model
{
    //
    protected $table = 'misconceptions';

    protected $fillable = [
        'code',
    ];
}
