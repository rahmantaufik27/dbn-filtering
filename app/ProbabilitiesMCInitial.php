<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProbabilitiesMCInitial extends Model
{
    //
    public $timestamps = false;
    protected $table = 'probabilities_mc_initials';

    protected $fillable = [
        'id_student',
        'PRQRPPR',
        'PRQRFR',
        'PRQRRR',
        'PRPPRFR',
        'PRPPRRR',
        'PRFRRR',
        'QRPPRFR',
        'QRPPRRR',
        'QRFRRR',
        'PPRFRRR',
        'PRQRPPRFR',
        'PRQRPPRRR',
        'PRQRFRRR',
        'PRPPRFRRR',
        'QRPPRFRRR',
        'PRQRPPRFRRR',
    ];
}
