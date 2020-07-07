<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';

    protected $primaryKey='idempleado';

    public $timestamps=false;


    protected $fillable =[
    	'idcategoria',
        'nombre',
        'apellidos',
        'fechanac',
        'correo',
        'telefono',
        'direccion',
        'genero',
        'ciudad',
        'srealizado',
        'estado'
    	
    ];

    protected $guarded =[

    ];
}
