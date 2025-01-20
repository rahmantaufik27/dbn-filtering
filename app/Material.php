<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $table = 'materials';

    protected $fillable = [
        'id_topic',
        'source',
        'name',
        'description',
        'created_at'
    ];
}
