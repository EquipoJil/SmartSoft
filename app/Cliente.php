<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';

    protected $primaryKey='idcliente';

    public $timestamps=false;


    protected $fillable =[
        'nombre',
        'apellidos',
        'edad',
    	'fechanac',
        'telefono',
        'correo',
        'direccion'	
    ];

    protected $guarded =[

    ];

}
