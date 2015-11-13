@extends('dashboard.layout')

@section('title')
	Listado Cinemas
@endsection

@section('titulo')
	Cinemas
@endsection

@section('contenido')

	<div class="row">

		<div class="col-md-6">
			<a class="btn btn-default" href="{{url('cinema/create')}}">Crear Cinema</a>
		</div>
	</div>

	@if(Session::has('exito'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  {{Session::get('exito')}}
		</div>
	@endif

	@if(count($cinemas)==0)
		<h1>No hay cinemas registradas</h1>
	@else 
		<table class="table">
	      <thead>
	        <tr>
	          <th>Nombre</th>
	          <th>Acciones</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach($cinemas as $cinema)
				<tr>
		          <td>{{$cinema->nombre}}</td>
		          <td><a href="{{url('cinema/edit',array('id'=>$cinema->id_cinema))}}"><i class="glyphicon glyphicon-pencil"></i> Editar Registro</a> - <a href="{{url('cinema/delete',array('id'=>$cinema->id_cinema))}}"><i class="glyphicon glyphicon-trash"></i> Borrar registro</a>  </td>
		        </tr>
			@endforeach
	        
	      </tbody>
	    </table>

	@endif
	
@endsection