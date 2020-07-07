<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\CategoriaServicio;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\CategoriaServicioFormRequest;
use DB;


class CategoriaServicioController extends Controller
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
            $servicios=DB::table('categoria_servicio')->where('t_servicio','LIKE','%'.$query.'%')
            ->where('condicion','=' ,'1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('categoria.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("categoria.servicio.create");
    }
    public function store (CategoriaServicioFormRequest $request)
    {
        $servicio=new CategoriaServicio;
        $servicio->t_servicio=$request->get('t_servicio');
        $servicio->descripcion=$request->get('descripcion');
        $servicio->condicion='1';
        $servicio->save();
        return Redirect::to('categoria/servicio');

    }
    public function show($id)
    {
        return view("categoria.servicio.show",["servicio"=>CategoriaServicio::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("categoria.servicio.edit",["servicio"=>CategoriaServicio::findOrFail($id)]);
    }
    public function update(CategoriaServicioFormRequest $request,$id)
    {
        $servicio=CategoriaServicio::findOrFail($id);
        $servicio->t_servicio=$request->get('t_servicio');
        $servicio->descripcion=$request->get('descripcion');
        $servicio->update();
        return Redirect::to('categoria/servicio');
    }
    public function destroy($id)
    {
        $servicio=CategoriaServicio::findOrFail($id);
        $servicio->condicion='0';
        $servicio->update();
        return Redirect::to('categoria/servicio');
    }

}
