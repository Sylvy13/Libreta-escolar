<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Acudiente;
use App\Models\Docentes;
use App\Models\Usuario;

class AcudienteController extends Controller #Creacion de la clase AcudienteController que contendra los metodos de la clase acudiente
{
    

    public function show_estudiantes(){ #Funcion que se encarga de mostrar al acudiente los estudiantes que tiene a su cargo de tener mas de uno
        $estudiantes = Estudiante::orderBy('nombre', 'desc')->get();
        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first()];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first()];
        }
        return view('preview', $data, compact('estudiantes'));
    }
}
