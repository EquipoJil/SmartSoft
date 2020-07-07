@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Agenda: {{ $servicio->fecha}}</h3>
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
			{!!Form::model($servicio,['method'=>'PATCH','route'=>['cliente.agenda.update',$servicio->idservicio],'files'=>'true'])!!}
            {{Form::token()}}
            
           <div class="row">     
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label >Servicio</label>
            		<select name="idcategoria" class="form-control">
            			@foreach ($categorias as $cat)
                        @if ($cat->idcategoria==$servicio->idcategoria)
            			<option value="{{$cat->idcategoria}}" selected>{{$cat->t_servicio}}</option>
                        @else
                        <option value="{{$cat->idcategoria}}">{{$cat->t_servicio}}</option>
                        @endif
            			@endforeach
            		</select>
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
            		<label for="fechan">Fecha</label>
            		<input type="Date" name="fecha" required value="{{$servicio->fecha}}" class="form-control" placeholder="Codigo del articulo">
            	</div>	
            </div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            	<div class="form-group">
            		<label for="hora">Hora</label>
            		<input type="time" name="hora" value="{{$servicio->hora}}" class="form-control" placeholder="Descripción del articulo">
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
          