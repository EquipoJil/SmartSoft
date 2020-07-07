<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\Servicio;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\ServicioFormRequest;
use DB;

class ServicioController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $servicios=DB::table('servicio as a')
            ->join('categoria_servicio as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idservicio','a.direccion','c.t_servicio as categoria_servicio','a.fecha','a.hora')
            ->where('a.fecha','LIKE','%'.$query.'%')
            ->orderBy('idservicio','desc')
            ->paginate(7);

            return view('cliente.servicio.index',["servicios"=>$servicios,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        return view("cliente.servicio.create",["categorias"=>$categorias]);
    }
    public function store (ServicioFormRequest $request)
    {
        $servicio=new Servicio;
        $servicio->idcategoria=$request->get('idcategoria');
        $servicio->direccion=$request->get('direccion');
        $servicio->fecha=$request->get('fecha');
        $servicio->hora=$request->get('hora');      
        $servicio->save();
        return Redirect::to('cliente/servicio');
    }
    public function show($id)
    {
    	  return view("cliente.servicio.show",["servicio"=>Servicio::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$servicio=Servicio::findOrFail($id);
    	$categorias=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        return view("cliente.servicio.edit",["servicio"=>$servicio,"categorias"=>$categorias]);

    }
    public function update(ServicioFormRequest $request,$id)
    {
        $servicio=new Servicio;
        $servicio->idcategoria=$request->get('idcategoria');
        $servicio->direccion=$request->get('direccion');
        $servicio->fecha=$request->get('fecha');
        $servicio->hora=$request->get('hora');      
        $servicio->save();
        return Redirect::to('cliente/servicio');
    }
    public function destroy($id)
    {
        $servicio=Servicio::findOrFail($id);
       
        $servicio->update();
        return Redirect::to('cliente/servicio');
    }
}
