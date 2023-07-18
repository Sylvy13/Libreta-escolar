<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\Usuario;
use App\Models\Docentes;
use App\Models\Acudiente;
use App\Models\entrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActividadController extends Controller #Creacion de la clase ActividadController que contendra los metodos de la clase Actividad---Jorge Olarte Alean
{
    public function show(string $curso){        #Funcion que se encarga de mostrar las actividades de un curso recibiendo su ID
        $actividades = actividad::orderBy('created_at', 'desc')->get();
        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'curso'=>$curso];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 'curso'=>$curso];
        }
        return view('actividades.show', $data, compact('actividades'));
    }

    public function create(Usuario $usuario, string $curso){     #Funcion que se encarga de mostrar el formulario de creacion de actividades
        $data = ['curso'=>$curso];
        return view('actividades.create', $data, compact('usuario'));
    }

    public function store(Request $request, string $curso ){    #Funcion que se encarga de almacenar las actividades a crear
        
        $todayDate = date('m/d/Y');
        
        $actividad = new Actividad();
        $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first()];

        $request->validate([    
            'titulo'=>'required',
            'descripcion'=>'required',
            'fecha_entrega'=>'after:'.$todayDate    
        ]);


        $actividad->titulo = $request->titulo;
        $actividad->descripcion = $request->descripcion;
        $actividad->fecha_entrega = $request->fecha_entrega;
        $actividad->curso = $curso;
        
        if($request->file()){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file->move('storage/uploads',$fileName);
            $actividad->file_path = null;
            $actividad->file_name = time().'_'.$request->file->getClientOriginalName();   
        }
        $actividad->save();

        return redirect()->route('actividades.show', $curso);
    
    }
    
    public function ver(string $curso, int $id ){       #Funcion que se encarga de mostrar los detalles de una actividad en especifico
        $actividades = actividad::orderBy('created_at', 'desc')->get();
        $entregas = entrega::orderBy('created_at', 'desc')->get();
        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'id'=>$id, 'curso'=>$curso];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 'id'=>$id, 'curso'=>$curso];
        }
        return view('actividades.ver', $data, compact('actividades','entregas'));
    }


    public function destroy(string $curso, actividad $actividad){  #Funcion que se encarga de eliminar actividades

        $actividad->delete();

        return redirect()->route('actividades.show', $curso);
    }
    
    public function download($file){  #Funicon que permite la descarga de archivos que se hayan almacenado al crear la actividad
        
        $path = storage_path($file);

        return response()->download(public_path('storage/uploads/'.$file));
        
    }
}
