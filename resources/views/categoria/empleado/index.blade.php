@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Perfil de Empleados <a href="empleado/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('categoria.empleado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Profesión</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
               @foreach ($empleados as $emp)
				<tr>
					<td>{{ $emp->idcategoria}}</td>
					<td>{{ $emp->profesion}}</td>
					<td>{{ $emp->descripcion}}</td>
					<td>
						<a href="{{URL::action('CategoriaEmpleadoController@edit',$emp->idcategoria)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$emp->idcategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('categoria.empleado.modal')
				@endforeach
			</table>
		</div>
		{{$empleados->render()}}
	</div>
</div>

@endsection