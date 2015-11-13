<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\Sala;
use App\Ciudad;
use App\Cinema;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalaController extends Controller{

	public function index(){
		$cinemas = Cinema::all();
		return view('dashboard.cinema.list',array('cinemas'=>$cinemas));
	}

	public function create(){
		$ciudades = Ciudad::all();
		return view('dashboard.cinema.create',array('ciudades'=>$ciudades));
	}

	public function store(Request $request){
		$validator = Validator::make($request->all(),[
			'identificador' => "required|unique",
			'nombre' => "required",
			'direccion' => "required",
			'telefono' => "required",
			'ciudad' => "required|exists:ciudad,id"
		]);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator->errors());
		}else{
			$cinema = new Cinema();
			$cinema->identificador = $request->input("identificador");
			$cinema->nombre = $request->input("nombre");
			$cinema->direccion = $request->input("direccion");
			$cinema->telefono = $request->input("telefono");
			$cinema->id_ciudad = $request->input("ciudad");
			$cinema->save();
			return redirect('cinema/list')->with('exito','El cinema ha sido creado exitosamente');
		}
	}

	public function edit(Request $request, $id){
		$cinema = Cinema::find($id);
		$ciudades = Ciudad::all();
		return view('dashboard.cinema.edit',array('cinema'=>$cinema,'ciudades'=>$ciudades));
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

}