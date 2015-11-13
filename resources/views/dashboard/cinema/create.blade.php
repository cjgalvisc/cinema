@extends('dashboard.layout')

@section('title')
	Crear sala
@endsection

@section('titulo')
	Crear sala
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('cinema/list')}}">Volver</a> 
		</div>
	</div>

	@if(Session::has('errors'))
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php print_r($errors); ?>
		</div>
	@endif
	
	<form action="{{url('cinema/store')}}" method="post" id="sala-crear">

		<label for="identificador">identificador</label>

		<input type="text" name="identificador" class="form-control">

		<label for="nombre">nombre</label>

		<input type="text" name="nombre" class="form-control">
		
		<label for="direccion">direccion</label>

		<input type="text" name="direccion" class="form-control">

		<label for="telefono">telefono</label>

		<input type="text" name="telefono" class="form-control">

		<label for="ciudad">Ciudad</label>

		<select name="ciudad">
			@foreach($ciudades as $ciudad)
				<option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
			@endforeach
		</select>
		

		<input type="submit" value="Guardar ciudad" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">

	</form>
	
@endsection