<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    //Listado de usuarios
    public function list(){
        $data['users'] = Usuario::paginate(3);

        return view('usuarios.list',$data);
    }

    //formulario de usuarios
    public function userform(){

        return view('usuarios.userform');
    }

    //Guardar usuario
    public function save(Request $request){

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'email'=>'required|string|max:255|email|unique:usuarios'
        ]);
        
        $userdata = request()->except('_token');
        Usuario::insert($userdata);

        //return response()->json($userdata);
        return back()->with('usuarioGuardado', 'Usuario guardado');
    }

}
