@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Empleado: {{ $empleado->nombre}}</h3>
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
			{!!Form::model($empleado,['method'=>'PATCH','route'=>['personal.empleado.update',$empleado->idempleado],'files'=>'true'])!!}
            {{Form::token()}}
            
           <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="nombre">Nombre</label>
            		<input type="text" name="nombre" required value="{{$empleado->nombre}}" class="form-control">
            	</div>	
            </div>   
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="apellidos">Apellidos</label>
            		<input type="text" name="apellidos" required value="{{$empleado->apellidos}}" class="form-control">
            	</div>	
            </div>         
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label >Profesion</label>
            		<select name="idcategoria" class="form-control">
            			@foreach ($categorias as $cat)
                        @if ($cat->idcategoria==$empleado->idcategoria)
            			<option value="{{$cat->idcategoria}}" selected>{{$cat->profesion}}</option>
                        @else
                        <option value="{{$cat->idcategoria}}">{{$cat->profesion}}</option>
                        @endif
            			@endforeach
            		</select>
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="fechanac">Fecha de nacimiento</label>
            		<input type="Date" name="fechanac" required value="{{$empleado->fechanac}}" class="form-control" placeholder="Codigo del articulo">
            	</div>	
            </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="correo">Correo</label>
            		<input type="email" name="correo" required value="{{$empleado->correo}}" class="form-control" placeholder="Stock del articulo">
           		</div>	
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="telefono">Telefono</label>
            		<input type="text" name="telefono" value="{{$empleado->telefono}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="srealizado">Servicios realizados</label>
            		<input type="numeric" name="srealizado" value="{{$empleado->srealizado}}" class="form-control" placeholder="Servicios realizados">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="direccion">Dirección</label>
            		<input type="text" name="direccion" value="{{$empleado->direccion}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="genero">Genero</label>
            		<input type="text" name="genero" value="{{$empleado->genero}}" class="form-control" placeholder="Descripción del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="ciudad">Ciudad</label>
            		<input type="text" name="ciudad" value="{{$empleado->ciudad}}" class="form-control" placeholder="Descripción del articulo">
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
          