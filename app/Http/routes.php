<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('dashboard', function () {
    return view('dashboard.layout');
});

Route::get('/','RegistroController@iniciar');
Route::post('/','RegistroController@login');
Route::get('loginFB','RegistroController@loginFBauth');
Route::get('callbackFB','RegistroController@callbackFB');

Route::group(['middleware'=>'auth'],function(){
	Route::get('cerrar','RegistroController@logout');
	//Acciones relacionadas a la ciudad
	Route::group(['prefix'=>'ciudad'],function(){
		Route::get("list","CiudadController@index");
		Route::get("create","CiudadController@create");
		Route::post("store","CiudadController@store");
		Route::get("edit/{id}","CiudadController@edit");
		Route::put("update/{id}","CiudadController@update");
		Route::get("delete/{id}","CiudadController@delete");
	});
	//Acciones relacionadas a la creacion de usuarios
	Route::group(['prefix'=>'usuario'],function(){
		Route::get("list","UsuarioController@index");
		Route::get("create","UsuarioController@create");
		Route::post("store","UsuarioController@store");
		Route::get("edit/{id}","UsuarioController@edit");
		Route::put("update/{id}","UsuarioController@update");
		Route::get("delete/{id}","UsuarioController@delete");
	});
	//Acciones relacionadas al cinema
	Route::group(['prefix'=>'cinema'],function(){
		Route::get("list","CinemaController@index");
		Route::get("create","CinemaController@create");
		Route::post("store","CinemaController@store");
		Route::get("edit/{id}","CinemaController@edit");
		Route::put("update/{id}","CinemaController@update");
		Route::get("delete/{id}","CinemaController@delete");
	});
	//Acciones relacionadas a la sala
	Route::group(['prefix'=>'sala'],function(){
		Route::get("list","SalaController@index");
		Route::get("create","SalaController@create");
		Route::post("store","SalaController@store");
		Route::get("edit/{id}","SalaController@edit");
		Route::put("update/{id}","SalaController@update");
		Route::get("delete/{id}","SalaController@delete");
	});
	//Acciones relacionadas a la pelicula
	Route::group(['prefix'=>'pelicula'],function(){
		Route::get("list","PeliculaController@index");
		Route::get("create","PeliculaController@create");
		Route::post("store","PeliculaController@store");
		Route::get("edit/{id}","PeliculaController@edit");
		Route::put("update/{id}","PeliculaController@update");
		Route::get("delete/{id}","PeliculaController@delete");
	});
});










