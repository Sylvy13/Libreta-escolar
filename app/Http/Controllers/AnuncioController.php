<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use App\Models\Anuncio;
use App\Models\Docentes;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Usuario;

class AnuncioController extends Controller  #Creacion de la clase AnuncioController que contendra los metodos de la clase Anuncio---Sylvana Alcala Briceño
{
    public function acudiente(){    #Funcion para recuperar el nombre del acudiente que publico el anuncio
        return $this->belongsTo(Acudiente::class);
    }

    public function docente(){      #Funcion para recuperar el nombre del docente que publico el anuncio
        return $this->belongsTo(Docentes::class);
    }

    public function show(string $curso){    #Funcion para mostrar todos los anuncios publicados del curso
        $anuncios = Anuncio::orderBy('created_at', 'desc')->get();
        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'curso'=>$curso];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 'curso'=>$curso];
        }

        return view('anuncios.show',$data , compact('anuncios'));
    }

    public function create(Usuario $usuario, string $curso){     #Funcion que se encarga de mostrar el formulario de creacion de anuncios
            $data = ['curso'=>$curso];
            return view('anuncios.create', $data,compact('usuario'));
    }

    public function store(Request $request, string $curso){    #Funcion que se encarga de almacenar los anuncios a publicar
        $anuncio = new Anuncio();

        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first()];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first()];
        }
        $request->validate([
            'titulo'=>'required',
            'body'=>'required'
      
        ]);
        $anuncio->titulo = $request->titulo;
        $anuncio->body = $request ->body;
        $anuncio->usuario = $data['LoggedUserInfo']-> usuario;
        $anuncio->curso = $curso;

        $anuncio->save();

        return redirect()->route('anuncios.show.curso', $curso);

    }

    public function destroy(Anuncio $anuncio, string $curso){  #Funcion que se encarga de eliminar anuncios

            $anuncio->delete();
    
            return redirect()->route('anuncios.show.curso', $curso);
        
    }
 
}
