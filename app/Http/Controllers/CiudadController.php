<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;

use App\Ciudad;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class CiudadController extends Controller
{
    public function index()
    {
        //Mostrar paises
        $ciudades = Ciudad::all();
        return view("dashboard.ciudad.list",array("ciudades"=>$ciudades));
    }

    public function create(Request $request)
    {
        return view("dashboard.ciudad.create");

    }

    public function store(Request $request)
    {
        $ciudad = new Ciudad();
        $ciudad->nombre =  $request->input("nombre");
        $ciudad->save();
        return redirect('ciudad/list')->with('exito','La ciudad ha sido creada con éxito');
    }

    public function show($id)
    {
        //Mostrar un pais
    }

    public function edit(Request $request, $id)
    {
        $ciudad = Ciudad::find($id);
        $cinemas = $this->consultarCinemas($id);
        return view('dashboard.ciudad.edit',array("ciudad"=>$ciudad,"cinemas"=>$cinemas));

    }

    public function update(Request $request, $id)
    {
        $ciudad = Ciudad::find($id);
        $ciudad->nombre = $request->input("nombre");
        $ciudad->save();
        return redirect('ciudad/list')->with('exito','La ciudad se ha actualizado con éxito');
    }

    public function delete($id)
    {
        $ciudad = Ciudad::find($id);
        $ciudad->delete();
        return redirect('ciudad/list')->with('exito','La ciudad se ha eliminado con éxito');
    }

    private function consultarCinemas($id){
        $cinemas = DB::table('ciudad')
            ->join('cinema','ciudad.id','=','cinema.id_ciudad')
            ->where('ciudad.id','=',$id)
            ->select('cinema.identificador','cinema.nombre')
            ->get();
        return $cinemas;
    }
}
