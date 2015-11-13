<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\Sala;
use App\Ciudad;
use App\Cinema;
use App\Pelicula;
use App\Formato;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PeliculaController extends Controller{

	public function index(){
		$peliculas = Pelicula::all();
		return view('dashboard.pelicula.list',array('peliculas'=>$peliculas));
	}

	public function create(){
		$formatos = Formato::all();
		return view('dashboard.pelicula.create',array('formatos'=>$formatos));
	}

	public function store(Request $request){

		$validator = Validator::make($request->all(),[
			'nombre_pelicula' => "required",
			'duracion_pelicula' => "required|integer",
			'imagen_pelicula' => "required",
			'formato_id_formato' => "required"
		]);

		if($validator->fails()){
			return redirect()->back()->withErrors($validator->errors());
		}else{
			$pelicula = new Pelicula();
			$pelicula->nombre_pelicula = $request->input('nombre_pelicula') ;
			$pelicula->duracion_pelicula = $request->input('duracion_pelicula');
			$pelicula->formato_id_formato = $request->input('formato_id_formato');
			if($request->hasfile('imagen_pelicula')){
				$pelicula->imagen_pelicula = $this->guardarArchivo($request->file('imagen_pelicula'));
			};
			$pelicula->save();

			return redirect('pelicula/list')->with('exito','La pelicula ha sido creado exitosamente');
		}
	}

	public function edit(Request $request, $id){
		$pelicula = Pelicula::find($id);
		$formatos = Formato::all();
		return view('dashboard.pelicula.edit',array('pelicula'=>$pelicula,'formatos'=>$formatos));
	}

	public function update(Request $request, $id){
		$cinema = Cinema::find($id);
		$cinema->identificador = $request->input("identificador");
		$cinema->nombre = $request->input("nombre");
		$cinema->direccion = $request->input("direccion");
		$cinema->telefono = $request->input("telefono");
		$cinema->id_ciudad = $request->input("ciudad");
		$cinema->save();
		return redirect('cinema/list')->with('exito','El cinema ha sido actualizado exitosamente');
	}

	public function delete($id){
		$cinema = Cinema::find($id);
		$cinema->delete();
		return redirect('cinema/list')->with('exito','El cinema ha sido eliminado exitosamente');
	}

	private function guardarArchivo($file){
		$nombreArchivo = "";
		$extension = $file->getClientOriginalExtension();
		$nombreArchivo = "pelicula_".rand().".".$extension;
		$file->move('uploads/peliculas',$nombreArchivo);
		return $nombreArchivo;
	}

}