@extends('dashboard.layout')

@section('title')
	Listado ciudades
@endsection

@section('titulo')
	Ciudades
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a class="btn btn-default" href="{{url('ciudad/create')}}">Crear Ciudad</a>
		</div>
	</div>

	@if(Session::has('exito'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  {{Session::get('exito')}}
		</div>
	@endif

	@if(count($ciudades)==0)
		<h1>No hay ciudades registrados</h1>
	@else 
		<table class="table">
	      <thead>
	        <tr>
	          <th>Nombre</th>
	          <th>Acciones</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach($ciudades as $ciudad)
				<tr>
		          <td>{{$ciudad->nombre}}</td>
		          <td><a href="{{url('ciudad/edit',array('id'=>$ciudad->id))}}"><i class="glyphicon glyphicon-pencil"></i> Editar Registro</a> - <a href="{{url('ciudad/delete',array('id'=>$ciudad->id))}}"><i class="glyphicon glyphicon-trash"></i> Borrar registro</a>  </td>
		        </tr>
			@endforeach
	        
	      </tbody>
	    </table>

	@endif
	
@endsection