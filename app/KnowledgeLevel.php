<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeLevel extends Model
{
    //
    protected $table = 'knowledge_levels';

    protected $fillable = [
        'competency',
        'name'
    ];

}
