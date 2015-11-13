@extends('dashboard.layout')

@section('title')
	Editar cinema
@endsection

@section('titulo')
	Editar cinema
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('cinema/list')}}">Volver</a> 
		</div>
	</div>
	
	
	<form action="{{url('cinema/update',array('id'=>$cinema->id_cinema) )}}" method="POST" id="cinema-crear">

		<input type="hidden" name="_method" value="PUT">


		<label for="identificador">identificador</label>

		<input type="text" name="identificador" class="form-control" value="{{$cinema->identificador}}">

		<label for="nombre">nombre</label>

		<input type="text" name="nombre" class="form-control" value="{{$cinema->nombre}}">
		
		<label for="direccion">direccion</label>

		<input type="text" name="direccion" class="form-control" value="{{$cinema->direccion}}">

		<label for="telefono">telefono</label>

		<input type="text" name="telefono" class="form-control" value="{{$cinema->telefono}}">

		<label for="ciudad">Ciudad</label>

		<select name="ciudad">
			@foreach($ciudades as $ciudad)
				@if($ciudad->id == $cinema->id_ciudad)
					<option selected="" value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
				@else
					<option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
				@endif
				
			@endforeach
		</select>


		
		<input type="submit" value="Guardar ciudad" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">


	</form>
	
@endsection