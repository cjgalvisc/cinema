@extends('dashboard.layout')

@section('title')
	Crear ciudad
@endsection

@section('titulo')
	Crear ciudad
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('ciudad/list')}}">Volver</a> 
		</div>
	</div>
	
	<form action="{{url('ciudad/store')}}" method="post" id="ciudad-crear">

		<label for="nombre">Nombre de la ciudad</label>

		<input type="text" name="nombre" class="form-control">
		
		<input type="submit" value="Guardar ciudad" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">

	</form>
	
@endsection