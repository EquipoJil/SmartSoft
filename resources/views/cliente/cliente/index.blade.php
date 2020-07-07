@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('cliente.cliente.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Edad</th>
					<th>Fecha de nacimiento</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Dirección</th>
				</thead>
               @foreach ($clientes as $client)
				<tr>
					<td>{{ $client->idcliente}}</td>
					<td>{{ $client->nombre}}</td>
					<td>{{ $client->apellidos}}</td>
					<td>{{ $client->edad}}</td>
					<td>{{ $client->fechanac}}</td>
					<td>{{ $client->telefono}}</td>
					<td>{{ $client->correo}}</td>
					<td>{{ $client->direccion}}</td>
				
					<td>
						<a href="{{URL::action('ClienteController@edit',$client->idcliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$client->idcliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('cliente.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection