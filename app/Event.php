<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table= 'evento';

    //
    protected $fillable = [
        'titulo', 'descripcion', 'fecha',
    ];

    public $timestamps = false;
}
