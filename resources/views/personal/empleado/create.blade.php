@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Lista de empleados</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'personal/empleado','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="nombre">Nombre</label>
            		<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="apellidos">Apellidos</label>
            		<input type="text" name="apellidos" required value="{{old('apellidos')}}" class="form-control" placeholder="Nombre...">
            	</div>	
            </div>
            
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label >Profesión</label>
            		<select name="idcategoria" class="form-control">
            			@foreach ($categorias as $cat)
            			<option value="{{$cat->idcategoria}}">{{$cat->profesion}}</option>
            			@endforeach
            		</select>
            	</div>	
            </div>
           	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="fechanac">Fecha de nacimiento</label>
            		<input type="Date" name="fechanac" required value="{{old('fechanac')}}" class="form-control" placeholder="Codigo del articulo">
            	</div>	
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="correo">Correo</label>
            		<input type="email" name="correo" required value="{{old('correo')}}" class="form-control" placeholder="Stock del articulo">
           		</div>	
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="telefono">Telefono</label>
            		<input type="text" name="telefono" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="direccion">Dirección</label>
            		<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="genero">Genero</label>
            		<input type="text" name="genero" value="{{old('descripcion')}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="ciudad">Ciudad</label>
            		<input type="text" name="ciudad" value="{{old('ciudad')}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="srealizado">Servicios realizados</label>
            		<input type="number" name="srealizado" value="{{old('srealizado')}}" class="form-control" placeholder="Total de servicios realizados">
            	</div>	
            </div>
        
       			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            		<div class="form-group">
            		<button class="btn btn-primary" type="submit">Guardar</button>
            		<button class="btn btn-danger" type="reset">Cancelar</button>
           		</div>
        	</div>
       	 </div>

			{!!Form::close()!!}		
	
@endsection