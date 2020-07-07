@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Agregar cliente nuevo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
			{!!Form::open(array('url'=>'cliente/cliente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			
		<div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="nombre">Nombre</label>
            		<input type="text" name="nombre" class="form-control" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="apellidos">Apellidos</label>
            		<input type="text" name="apellidos" class="form-control" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
           		<div class="form-group">
            		<label for="edad">Edad</label>
            		<input type="text" name="edad" class="form-control" placeholder="Nombre completo...">
            	</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="fechanac">Fecha de nacimiento</label>
            		<input type="date" name="fechanac" class="form-control" placeholder="Fecha de nacimiento...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="telefono">Telefono</label>
            		<input type="text" name="telefono" class="form-control" placeholder="Telefono...">
				</div>
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
            		<label for="correo">Correo</label>
            		<input type="text" name="correo" class="form-control" placeholder="Correo...">
				</div>
			</div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="direccion">Dirreción</label>
            		<input type="text" name="direccion" class="form-control" placeholder="Direccion...">
				</div>
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
			{!!Form::close()!!}		
		</div>
	</div>
@endsection