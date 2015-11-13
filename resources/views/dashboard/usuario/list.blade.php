@extends('dashboard.layout')

@section('title')
	Listado Usuarios
@endsection

@section('titulo')
	Usuarios
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a class="btn btn-default" href="{{url('usuario/create')}}">Crear Usuario</a>
		</div>
	</div>

	@if(Session::has('exito'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  {{Session::get('exito')}}
		</div>
	@endif

	@if(count($usuarios)==0)
		<h1>No hay usuarios registrados</h1>
	@else 
		<table class="table">
	      <thead>
	        <tr>
	          <th>Username</th>
	          <th>Email</th>
	          <th>Acciones</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach($usuarios as $usuario)
				<tr>
		          <td>{{$usuario->username}}</td>
		          <td>{{$usuario->email}}</td>
		          <td><a href="{{url('usuario/edit',array('id'=>$usuario->id))}}"><i class="glyphicon glyphicon-pencil"></i> Editar Registro</a> - <a href="{{url('usuario/delete',array('id'=>$usuario->id))}}"><i class="glyphicon glyphicon-trash"></i> Borrar registro</a>  </td>
		        </tr>
			@endforeach
	        
	      </tbody>
	    </table>

	@endif
	
@endsection