@extends('dashboard.layout')

@section('title')
	Editar pelicula
@endsection

@section('titulo')
	Editar pelicula
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('pelicula/list')}}">Volver</a> 
		</div>
	</div>
	
	
	<form action="{{url('pelicula/update',array('id'=>$pelicula->id_pelicula) )}}" method="POST" id="ciudad-crear">

		<input type="hidden" name="_method" value="PUT">

		<label for="nombre_pelicula">nombre de la pelicula</label>

		<input type="text" name="nombre_pelicula" class="form-control" value="{{$pelicula->nombre_pelicula}}">

		<label for="duracion_pelicula">duracion de la pelicula</label>

		<input type="text" name="duracion_pelicula" class="form-control" value="{{$pelicula->duracion_pelicula}}">
		
		<label for="imagen_pelicula">imagen de la pelicula</label>

		<div class="row">
			<div class="col-md-4">
				<img class="img-responsive" src="/uploads/peliculas/{{$pelicula->imagen_pelicula}}">
			</div>
		</div>

		<input type="file" name="imagen_pelicula" class="form-control">

		<label for="formato_id_formato">Formato</label>

		<select name="formato_id_formato">
			@foreach($formatos as $formato)
				@if($formato->id_formato == $pelicula->formato_id_formato)
					<option selected="selected" value="{{$formato->id_formato}}">{{$formato->nombre_formato}}</option>
				@else 
					<option value="{{$formato->id_formato}}">{{$formato->nombre_formato}}</option>
				@endif
			@endforeach
		</select>
		
		<input type="submit" value="Guardar pelicula" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">


	</form>
	
@endsection