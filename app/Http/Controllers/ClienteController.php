<?php

namespace Apwcos_eia\Http\Controllers;

use Illuminate\Http\Request;
use Apwcos_eia\Http\Requests;
use Apwcos_eia\Cliente;
use Illuminate\Support\Facades\Redirect;
use Apwcos_eia\Http\Requests\ClienteFormRequest;
use DB;



class ClienteController extends Controller
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
            $clientes=DB::table('clientes')->where('nombre','LIKE','%'.$query.'%')
            ->orderBy('idcliente','desc')
            ->paginate(7);
            return view('cliente.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("cliente.cliente.create");
    }
    public function store (ClienteFormRequest $request)
    {
        $cliente = new Cliente;
        $cliente->nombre=$request->get('nombre');
        $cliente->apellidos=$request->get('apellidos');
        $cliente->edad=$request->get('edad');
        $cliente->fechanac=$request->get('fechanac');
        $cliente->telefono=$request->get('telefono');
        $cliente->correo=$request->get('correo');
        $cliente->direccion=$request->get('direccion');
        $cliente->save();
        return Redirect::to('cliente/cliente');

    }
    public function show($id)
    {
        return view("cliente.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("cliente.cliente.edit",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function update(ClienteFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);

        $cliente->nombre=$request->get('nombre');
        $cliente->apellidos=$request->get('apellidos');
        $cliente->edad=$request->get('edad');
        $cliente->fechanac=$request->get('fechanac');
        $cliente->telefono=$request->get('telefono');
        $cliente->correo=$request->get('correo');
        $cliente->direccion=$request->get('direccion');
        
        $cliente->update();
        return Redirect::to('cliente/cliente');
    }
    public function destroy($id)
    {
        $cliente = DB::table('clientes')->where('id','=', $id)->delete();
        return Redirect::to('cliente/cliente');
    }





}
