<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    //Atención a las convenciones:
    //Métodos convencionales de Laravel:
    //1. index() -- Mostrar todos los paises o countries
    //2. store() -- Guardar un país
    //3. update() -- Actualizar un país
    //4. destroy() -- Eliminar un país
    //5. edit() -- Mostrar el formulario de edición de países
    
    public function store(Request $request){

        $request->validate([
            'country_code'=>'required|string|min:2|max:10|unique:countries,country_code',
            'country_name'=>'required|string|min:4|max:50'
        ]);
        
        Country::create([
            'country_code'=>$request->country_code,
            'country_name'=>$request->country_name
        ]);
        //Redireccionar: El método back() devuelve el control a la pantalla anterior
        return redirect()->back()
        ->with('success','Pais creado correctamente');
    }





    //Mostrar datos
    public function index(Request $request){
        $countries = Country::get();
        return view('country.index', ['country' => $countries]);
    }
}
