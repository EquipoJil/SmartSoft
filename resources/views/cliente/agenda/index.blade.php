@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de agendas <a href="agenda/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('cliente.agenda.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Servicio</th>
					<th>Dirección</th>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($agendas as $age)
				<tr>
					<td>{{ $age->idservicio}}</td>
					<td>{{ $age->categoria_servicio}}</td>
					<td>{{ $age->direccion}}</td>
					<td>{{ $age->fecha}}</td>					
					<td>{{ $age->hora}}</td>
					<td>{{ $age->condicion}}</td>

					<td>
						<a href="{{URL::action('AgendaController@edit',$age->idservicio)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$age->idservicio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('cliente.agenda.modal')
				@endforeach
			</table>
		</div>
		{{$agendas->render()}}
	</div>
</div>

@endsection