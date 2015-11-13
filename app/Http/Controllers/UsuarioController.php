<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\User;
use Validator;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller{

	public function index(){
		$usuarios = User::all();
		return view('dashboard.usuario.list',array('usuarios'=>$usuarios));
	}

	public function create(){
		return view('dashboard.usuario.create');
	}
		

	public function store(Request $request){
		$validator = Validator::make($request->all(),[
			'identificacion'=>'required|unique:users,identificacion',
			'nombre'=>'required',
			'email'=>'required|email|unique:users,email',
			'password'=>'required',
			'username'=>'required|unique:users,username',
			'apellido'=>'required',
			'telefono'=>'required'
		]);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator->errors());
		}else{
			$usuario = new User();
			$usuario->identificacion = $request->input("identificacion");
			$usuario->nombre = $request->input("nombre");
			$usuario->email = $request->input("email");
			$usuario->password = Hash::make($request->input("password"));
			$usuario->username = $request->input("username");
			$usuario->apellido = $request->input("apellido");
			$usuario->telefono = $request->input("telefono");
			$usuario->save();
			return redirect('usuario/list')->with('exito','El usuario ha sido creado exitosamente');
		}
	}

	public function edit(Request $request, $id){
		$usuario = User::find($id);
		return view('usuario/edit',array("usuario"=>$usuario));
	}

	public function update(Request $request, $id){
		$usuario = User::find($id);
		$validator = Validator::make($request->all(),[
			'identificacion'=>'required|unique:users,identificacion',
			'nombre'=>'required',
			'email'=>'required|email|unique:users,email',
			'password'=>'required',
			'username'=>'required|unique:users,username',
			'apellido'=>'required',
			'telefono'=>'required'
		]);
		if($validator->fails()){
			return redirect()->back()->withErrors($validator->errors());
		}else{
			$usuario->identificacion = $request->input("identificacion");
			$usuario->nombre = $request->input("nombre");
			$usuario->email = $request->input("email");
			$usuario->password = Hash::make($request->input("password"));
			$usuario->username = $request->input("username");
			$usuario->apellido = $request->input("apellido");
			$usuario->telefono = $request->input("telefono");
			$usuario->save();
			return redirect('usuario/list')->with('exito','El usuario ha sido actualizado exitosamente');
		}
	}

	public function delete($id){
		$usuario = User::find($id);
		$usuario->delete();
		return redirect('usuario/list')->with('exito','El usuario ha sido eliminado exitosamente');
	}

}