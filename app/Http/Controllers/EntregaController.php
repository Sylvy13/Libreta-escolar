<?php

namespace App\Http\Controllers;
use App\Models\actividad;
use App\Models\Usuario;
use App\Models\Docentes;
use App\Models\Acudiente;
use App\Models\entrega;
use Illuminate\Http\Request;

class EntregaController extends Controller #Creacion de la clase EntregaController que contendra los metodos de la clase Entrega--- Alejandro Botero Angarita
{
    public function show(string $curso, int $id){      #Funcion que se encarga de mostrar las entregas de un curso recibiendo su ID
        $entregas = entrega::orderBy('created_at', 'desc')->get();
        
        if(session('LoggedAcudiente')){
            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(),
             'curso'=>$curso, 
             'id'=>$id,
            'actividad'=>actividad::where('id', '=', $id)->first()];
        }else if(session('LoggedDocente')){
            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 
            'curso'=>$curso, 
            'id'=>$id, 
            'actividad'=>actividad::where('id', '=', $id)->first()];
        }
        return view('actividades.show_entrega', $data, compact('entregas'));
    }

    public function create(string $curso ,int $id ){     #Funcion que se encarga de mostrar el formulario de creacion de entregas
        $data = ['curso'=>$curso, 'id'=>$id];
        return view('actividades.create_entrega', $data);
    }

    public function store(Request $request, string $curso, int $id){    #Funcion que se encarga de almacenar las entregas a crear
        
        $entrega= new Entrega();
        $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'curso'=>$curso, 'id'=>$id];
        $entrega->id_actividad = $id;
        $entrega->descripcion = $request->descripcion;
        $entrega->usuario = $data['LoggedUserInfo']-> usuario;
        $entrega->id_acudiente = $data['LoggedUserInfo']->id;
        $entrega->curso = $curso;
        
        if($request->file()){
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file->move('storage/uploads',$fileName);
            $entrega->file_path = null;
            $entrega->file_name = time().'_'.$request->file->getClientOriginalName();    
        }
        
        $entrega->save();

        return redirect()->route('actividades.ver', [$curso, $id]);
    
    }

    public function calificar(Request $request, Entrega $entrega){      #Funcion que permite agregar una calificacion a las entregas realizadas
        $request->validate([
            'calificacion' => 'required|numeric'
        ]);
        $entrega->calificacion = $request->calificacion;
        $entrega->save();

        return redirect()->route('actividades.entrega.show', [$entrega->curso, $entrega->id_actividad])->with('Calificado con exito');
    }

    public function download($file){    #Funcion que permite la descarga de documentos adjuntos en las entregas
       
        $path = storage_path($file);

        return response()->download(public_path('storage/uploads/'.$file));
        
    }
}
