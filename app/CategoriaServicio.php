<?php

namespace Apwcos_eia;

use Illuminate\Database\Eloquent\Model;

class CategoriaServicio extends Model
{
    protected $table='categoria_servicio';

    protected $primaryKey='idcategoria';

    public $timestamps=false;


    protected $fillable =[
    	't_servicio',
        'descripcion',
        'condicion'
    	
    ];

    protected $guarded =[

    ];
}
