@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Empleados <a href="empleado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('personal.empleado.search')
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
					<th>Profesión</th>
					<th>fechanac</th>
					<th>correo</th>
					<th>Telefono</th>
					<th>Dirección</th>
					<th>Ciudad</th>
					<th>Total de S.R.</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($empleados as $lemp)
				<tr>
					<td>{{ $lemp->idempleado}}</td>
					<td>{{ $lemp->nombre}}</td>
					<td>{{ $lemp->apellidos}}</td>
					<td>{{ $lemp->categoria_emp}}</td>
					<td>{{ $lemp->fechanac}}</td>
					<td>{{ $lemp->correo}}</td>
					<td>{{ $lemp->telefono}}</td>
					<td>{{ $lemp->direccion}}</td>
				
					<td>{{ $lemp->ciudad}}</td>
					<td>{{ $lemp->srealizado}}</td>
					<td>{{ $lemp->estado}}</td>

					<td>
						<a href="{{URL::action('EmpleadoController@edit',$lemp->idempleado)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$lemp->idempleado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('personal.empleado.modal')
				@endforeach
			</table>
		</div>
		{{$empleados->render()}}
	</div>
</div>

@endsection