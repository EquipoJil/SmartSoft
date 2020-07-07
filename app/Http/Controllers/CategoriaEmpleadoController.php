<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\CategoriaEmpleado;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\CategoriaEmpleadoFormRequest;
use DB;


class CategoriaEmpleadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $empleados=DB::table('categoria_emp')->where('profesion','LIKE','%'.$query.'%')
            ->where('condicion','=' ,'1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('categoria.empleado.index',["empleados"=>$empleados,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("categoria.empleado.create");
    }
    public function store (CategoriaEmpleadoFormRequest $request)
    {
        $empleado=new CategoriaEmpleado;
        $empleado->profesion=$request->get('profesion');
        $empleado->descripcion=$request->get('descripcion');
        $empleado->condicion='1';
        $empleado->save();
        return Redirect::to('categoria/empleado');

    }
    public function show($id)
    {
        return view("categoria.empleado.show",["empleado"=>CategoriaEmpleado::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("categoria.empleado.edit",["empleado"=>CategoriaEmpleado::findOrFail($id)]);
    }
    public function update(CategoriaEmpleadoFormRequest $request,$id)
    {
        $empleado=CategoriaEmpleado::findOrFail($id);
        $empleado->profesion=$request->get('profesion');
        $empleado->descripcion=$request->get('descripcion');
        $empleado->update();
        return Redirect::to('categoria/empleado');
    }
    public function destroy($id)
    {
        $empleado=CategoriaEmpleado::findOrFail($id);
        $empleado->condicion='0';
        $empleado->update();
        return Redirect::to('categoria/empleado');
    }
}
