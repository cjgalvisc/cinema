<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\User;
use Validator;
use Auth;
use Socialite;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistroController extends Controller{

	public function iniciar(){
		return view('dashboard.login');
	}

	public function login(Request $request){
		$email = $request->input('email');
		$password = $request->input('password');
		if(Auth::attempt(['username'=>$email,'password'=>$password])){
			return redirect()->intended('dashboard');
		}else{
			return redirect('/')->with('error','Usuario o password no estan registrados');
		}
	}

	public function loginFBauth(Request $request){
		return Socialite::driver('facebook')->redirect();
	}

	public function logout(){
		Auth::logout();
		return redirect('/');
	}
}