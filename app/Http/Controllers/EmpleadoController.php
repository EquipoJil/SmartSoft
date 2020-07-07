<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\Empleado;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\EmpleadoFormRequest;
use DB;

class EmpleadoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $empleados=DB::table('empleados as a')
            ->join('categoria_emp as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idempleado','a.nombre','a.apellidos','a.fechanac','c.profesion as categoria_emp','a.correo','a.telefono','direccion','a.genero','a.ciudad','a.srealizado','estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orderBy('a.idempleado','desc')
            ->paginate(7);

            return view('personal.empleado.index',["empleados"=>$empleados,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria_emp')->where('condicion','=','1')->get();
        return view("personal.empleado.create",["categorias"=>$categorias]);
    }
    public function store (EmpleadoFormRequest $request)
    {
        $empleado=new Empleado;
        $empleado->idcategoria=$request->get('idcategoria');
        $empleado->nombre=$request->get('nombre');
        $empleado->apellidos=$request->get('apellidos');
        $empleado->fechanac=$request->get('fechanac');
        $empleado->correo=$request->get('correo');
        $empleado->telefono=$request->get('telefono');
        $empleado->direccion=$request->get('direccion');
        $empleado->genero=$request->get('genero');
        $empleado->ciudad=$request->get('ciudad');
        $empleado->srealizado=$request->get('srealizado');
        $empleado->estado='Activo';
        $empleado->save();
        return Redirect::to('personal/empleado');
    }
    public function show($id)
    {
    	  return view("personal.empleado.show",["empleado"=>Empleado::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$empleado=Empleado::findOrFail($id);
    	$categorias=DB::table('categoria_emp')->where('condicion','=','1')->get();
        return view("personal.empleado.edit",["empleado"=>$empleado,"categorias"=>$categorias]);

    }
    public function update(EmpleadoFormRequest $request,$id)
    {
        $empleado=Empleado::findOrFail($id);
        $empleado->idcategoria=$request->get('idcategoria');
        $empleado->nombre=$request->get('nombre');
        $empleado->apellidos=$request->get('apellidos');
        $empleado->fechanac=$request->get('fechanac');
        $empleado->correo=$request->get('correo');
        $empleado->telefono=$request->get('telefono');
        $empleado->direccion=$request->get('direccion');
        $empleado->genero=$request->get('genero');
        $empleado->ciudad=$request->get('ciudad');
        $empleado->srealizado=$request->get('srealizado');
        $empleado->update();
        return Redirect::to('personal/empleado');
    
    }
    public function destroy($id)
    {
        $empleado=Empleado::findOrFail($id);
        $empleado->estado='Inactivo';
        $empleado->update();
        return Redirect::to('personal/empleado');
    }

}
