@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Lista de agendas</h3>
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

			{!!Form::open(array('url'=>'cliente/agenda','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

        <div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label >Servicio</label>
            		<select name="idcategoria" class="form-control">
            			@foreach ($categorias as $cat)
            			<option value="{{$cat->idcategoria}}">{{$cat->t_servicio}}</option>
            			@endforeach
            		</select>
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
            		<label for="fecha">Fecha</label>
            		<input type="Date" name="fecha" required value="{{old('fecha')}}" class="form-control" placeholder="Codigo del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="hora">Hora</label>
            		<input type="time" name="hora" required value="{{old('hora','time')}}" class="form-control" placeholder="Codigo del articulo">
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