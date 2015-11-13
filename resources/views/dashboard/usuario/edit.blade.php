@extends('dashboard.layout')

@section('title')
	Editar ciudad
@endsection

@section('titulo')
	Editar ciudad
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('ciudad/list')}}">Volver</a> 
		</div>
	</div>
	
	
	<form action="{{url('ciudad/update',array('id'=>$ciudad->id) )}}" method="POST" id="ciudad-crear">

		<input type="hidden" name="_method" value="PUT">

		<label for="nombre">Nombre de la ciudad</label>

		<input type="text" name="nombre" class="form-control" value="{{$ciudad->nombre}}">
		
		<input type="submit" value="Guardar ciudad" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">


	</form>
	
@endsection