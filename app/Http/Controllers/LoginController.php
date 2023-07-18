<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\Admin;
use App\Models\Anuncio;
use Illuminate\Http\Request;
use App\Models\Docentes;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller    #Creacion de la clase LoginController que contendra los metodos para el inicio de sesion--- Cristian Moreno Peña
{
    function login_docente(){       #Funcion que devuelve el formulario de inicio de sesion para docentes
        return view('auth.logindocente');
    }

    function check_docente(Request $request){       #Funcion que valida la informacion de inicio de sesion de los docentes
        $request->validate([
            'usuario'=>'required',
            'contraseña'=>'required'
        ]);

        $userInfo = Docentes::where('usuario', '=', $request->usuario)->first();

        if(!$userInfo){
            return back()->with('fail', 'No se encuentra el usuario ingresado');
        }else{
            if(Hash::check($request->contraseña, $userInfo->contraseña)){
                $request ->session()->put('LoggedDocente', $userInfo->id);
                return redirect()->route('anuncios.show.curso', [$userInfo->curso]);
                /* $curso = ['curso'=>$userInfo->curso];
                return route('anuncios.show', $curso); */
            }else{
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }
    }

    function login_acudiente(){     #Funcion que devuelve el formulario de inicio de sesion para acudientes
        return view('auth.loginacudiente');
    }

    function check_acudiente(Request $request){     #Funcion que valida la informacion de inicio de sesion de los acudientes
        $request->validate([
            'usuario'=>'required',
            'contraseña'=>'required'
        ]);

        $userInfo = Acudiente::where('usuario', '=', $request->usuario)->first();
        
        if(!$userInfo){
            return back()->with('fail', 'No se encuentra el usuario ingresado');
        }else{
            if(Hash::check($request->contraseña, $userInfo->contraseña)){
                $request ->session()->put('LoggedAcudiente', $userInfo->id);
                return redirect('acudientes/preview');
            }else{
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }
    }

    function login_admin(){     #Funcion que devuelve el formulario de inicio de sesion para administradores
        return view('auth.loginadmin');
    }

    function check_admin(Request $request){     #Funcion que valida la informacion de inicio de sesion de los administradores
        $request->validate([
            'usuario'=>'required',
            'contraseña'=>'required'
        ]);

        $userInfo = Admin::where('usuario', '=', $request->usuario)->first();

        if(!$userInfo){
            return back()->with('fail', 'No se encuentra el usuario ingresado');
        }else{
            if(Hash::check($request->contraseña, $userInfo->contraseña)){
                $request ->session()->put('LoggedAdmin', $userInfo->id);
                return redirect('admin');
            }else{
                return back()->with('fail', 'Contraseña incorrecta');
            }
        }
    }

    function logout(){      #Funcion para cerrar sesion
        if(session()->has('LoggedAdmin')){
            session()->pull('LoggedAdmin');
            return redirect('/');
        }else if(session()->has('LoggedAcudiente')){
            session()->pull('LoggedAcudiente');
            return redirect('/');
        }else if(session()->has('LoggedDocente')){
            session()->pull('LoggedDcudiente');
            return redirect('/');
        }
    }

}

