@extends('dashboard.layout')

@section('title')
	Listado Peliculas
@endsection

@section('titulo')
	Peliculas
@endsection

@section('contenido')

	<div class="row">
		<div class="col-md-6">
			<a class="btn btn-default" href="{{url('pelicula/create')}}">Crear Pelicula</a>
		</div>
	</div>

	@if(Session::has('exito'))
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  {{Session::get('exito')}}
		</div>
	@endif

	@if(count($peliculas)==0)
		<h1>No hay peliculas registrados</h1>
	@else 
		<table class="table">
	      <thead>
	        <tr>
	          <th>Nombre</th>
	          <th>Acciones</th>
	        </tr>
	      </thead>
	      <tbody>
	        @foreach($peliculas as $pelicula)
				<tr>
		          <td>{{$pelicula->nombre_pelicula}}</td>
		          <td><a href="{{url('pelicula/edit',array('id'=>$pelicula->id_pelicula))}}"><i class="glyphicon glyphicon-pencil"></i> Editar Registro</a> - <a href="{{url('pelicula/delete',array('id'=>$pelicula->id_pelicula))}}"><i class="glyphicon glyphicon-trash"></i> Borrar registro</a>  </td>
		        </tr>
			@endforeach
	        
	      </tbody>
	    </table>

	@endif
	
@endsection