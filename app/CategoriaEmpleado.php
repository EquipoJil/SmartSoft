<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class CategoriaEmpleado extends Model
{
    protected $table='categoria_emp';

    protected $primaryKey='idcategoria';

    public $timestamps=false;


    protected $fillable =[
    	'profesion',
        'descripcion',
        'condicion'
    	
    ];

    protected $guarded =[

    ];
}
