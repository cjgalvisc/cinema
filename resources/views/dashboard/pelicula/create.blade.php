@extends('dashboard.layout')

@section('title')
	Crear pelicula
@endsection

@section('titulo')
	Crear pelicula
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('pelicula/list')}}">Volver</a> 
		</div>
	</div>

	@if(Session::has('errors'))
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php print_r($errors); ?>
		</div>
	@endif
	
	<form action="{{url('pelicula/store')}}" method="post" id="pelicula-crear" enctype="multipart/form-data">

		<label for="nombre_pelicula">nombre de la pelicula</label>

		<input type="text" name="nombre_pelicula" class="form-control">

		<label for="duracion_pelicula">duracion de la pelicula</label>

		<input type="text" name="duracion_pelicula" class="form-control">
		
		<label for="imagen_pelicula">imagen de la pelicula</label>

		<input type="file" name="imagen_pelicula" class="form-control">

		<label for="formato_id_formato">Formato</label>

		<select name="formato_id_formato">
			@foreach($formatos as $formato)
				<option value="{{$formato->id_formato}}">{{$formato->nombre_formato}}</option>
			@endforeach
		</select>
		

		<input type="submit" value="Guardar pelicula" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">

	</form>
	
@endsection