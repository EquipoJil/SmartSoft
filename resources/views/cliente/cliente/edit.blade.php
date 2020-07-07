@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.cliente.update',$cliente->idcliente]])!!}
            {{Form::token()}}
            <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="nombre">Nombre</label>
            		<input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="apellidos">Apellidos</label>
            		<input type="text" name="apellidos" class="form-control" value="{{$cliente->apellidos}}" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="edad">Edad</label>
            		<input type="text" name="edad" class="form-control" value="{{$cliente->edad}}" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            	<label for="fechanac">Fecha de nacimiento</label>
            	<input type="date" name="fechanac" class="form-control" value="{{$cliente->fechanac}}" placeholder="Fecha de nacimiento...">
            </div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono">telefono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}" placeholder="Telefono...">
              </div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
            	<label for="direccion">Dirreción</label>
            	<input type="text" name="direccion" class="form-control" value="{{$cliente->direccion}}" placeholder="Dirreccion...">
            </div>
			</div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection