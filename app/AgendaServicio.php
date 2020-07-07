<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class AgendaServicio extends Model
{
    protected $table='servicio';

    protected $primaryKey='idservicio';

    public $timestamps=false;


    protected $fillable =[
    	'idcategoria',
        'idcliente',
        'direccion',
        'fecha',
        'hora'
    	
    ];

    protected $guarded =[

    ];
}
