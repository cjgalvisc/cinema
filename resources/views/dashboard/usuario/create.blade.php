@extends('dashboard.layout')

@section('title')
	Crear usuario
@endsection

@section('titulo')
	Crear usuario
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a href="{{url('usuario/list')}}">Volver</a> 
		</div>
	</div>
	
	<form action="{{url('usuario/store')}}" method="post" id="usuario-crear">

		<label for="nombre">Nombre del usuario</label>

		<input type="text" name="nombre" class="form-control">

		<label for="apellido">Apellido del usuario</label>

		<input type="text" name="apellido" class="form-control">

		<label for="identificacion">Identificacion del usuario</label>

		<input type="text" name="identificacion" class="form-control">
		
		<label for="email">Email del usuario</label>

		<input type="email" name="email" class="form-control">


		<label for="nombre">Telefono del usuario</label>

		<input type="text" name="telefono" class="form-control">


		<label for="username">username del usuario</label>

		<input type="text" name="username" class="form-control">


		<label for="password">Password del usuario</label>

		<input type="password" name="password" class="form-control" id="password">


		<label for="re_password">Comprobar del usuario</label>

		<input type="password" name="re_password" class="form-control">


		<input type="submit" value="Guardar usuario" class="btn btn-default" >

		<input type="hidden" name="_token" value="{{csrf_token()}}">

	</form>
	
@endsection