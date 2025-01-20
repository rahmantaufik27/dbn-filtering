<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProbabilitiesKLInitial extends Model
{
    public $timestamps = false;
    protected $table = 'probabilities_kl_initials';

    protected $fillable = [
        'id_student',
        'C1',
        'C2',
        'C3'
    ];
}
