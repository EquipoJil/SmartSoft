<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\AgendaServicio;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\AgendaFormRequest;
use DB;

class AgendaController extends Controller
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
            $agendas=DB::table('servicio as a')
            ->join('categoria_servicio as c','a.idcategoria','=','c.idcategoria')
            ->select('a.idservicio','a.direccion','a.fecha','a.hora','c.t_servicio as categoria_servicio','condicion')
            ->where('a.fecha','LIKE','%'.$query.'%')
            ->orderBy('a.idservicio','desc')
            ->paginate(7);

            return view('cliente.agenda.index',["agendas"=>$agendas,"searchText"=>$query]);
        }
    }
    public function create()
    {
    	$categorias=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        return view("cliente.agenda.create",["categorias"=>$categorias]);
    }
    public function store (AgendaFormRequest $request)
    {
        $agenda=new Agenda;
        $agenda->idcategoria=$request->get('idcategoria');
        //$agenda->idcategoria=$request->get('idcliente');
        $agenda->direccion=$request->get('direccion');
        $agenda->fecha=$request->get('fecha');
        $agenda->hora=$request->get('hora');
        $agenda->condicion='Activo';
        $agenda->save();
        return Redirect::to('cliente/agenda');
    }
    public function show($id)
    {
    	  return view("cliente.agenda.show",["agenda"=>Agenda::findOrFail($id)]);
    }
    public function edit($id)
    {
    	$agenda=Agenda::findOrFail($id);
    	$categorias=DB::table('categoria_servicio')->where('condicion','=','1')->get();
        return view("cliente.agenda.edit",["agenda"=>$agenda,"categorias"=>$categorias]);

    }
    public function update(AgendaFormRequest $request,$id)
    {
        $agenda=Agenda::findOrFail($id);
        $agenda->idcategoria=$request->get('idcategoria');
        //$agenda->idcategoria=$request->get('idcliente');
        $agenda->direccion=$request->get('direccion');
        $agenda->fecha=$request->get('fecha');
        $agenda->hora=$request->get('hora');
        $agenda->update();
        return Redirect::to('cliente/agenda');
    
    }
    public function destroy($id)
    {
        $agenda=Agenda::findOrFail($id);
        $agenda->condicion='Inactivo';
        $agenda->update();
        return Redirect::to('cliente/agenda');
    }
}
