<?php

namespace App\Http\Controllers;

use App\Models\Acudiente;
use Illuminate\Http\Request;
use App\Models\Docentes;
use App\Models\Usuario;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller  #Creacion de la clase AdminController que contendra los metodos de la clase Admin--- Jorge Olarte Alean
{
    function register_docente(){   #Funcion que se encarga de mostrar el formulario de registro de docentes
        return view('admin.register_docente');
     
    }

    function save_docente(Request $request){  #Funcion que se encarga de almacenar los docentes a registrar
        //validar request
        $request->validate([
            
            'nombre'=>'required',
            'curso'=>'required',
            'usuario'=>'required|unique:docentes',
            'contraseña'=>'required|min:5'
            
        ]);

        $docente = new Docentes;

        $docente->nombre = $request->nombre;
        $docente->curso = $request->curso;
        $docente->usuario = $request->usuario;
        $contraseñahash = Hash::make($request->contraseña);
        $docente->contraseña = $contraseñahash;
        $save = $docente->save();


        if($save){
            return back()->with('success', 'Se ha registrado correctamente al docente');
        }else{
            return back()->with('fail', 'Algo salio mal');
        }
    }

    function register_acudiente(){   #Funcion que se encarga de mostrar el formulario de registro de acudientes
        return view('admin.register_acudiente');
     
    }

    function save_acudiente(Request $request){  #Funcion que se encarga de almacenar los docentes a registrar
        //validar request
        $request->validate([
            'nombre'=>'required',
            'telefono'=>'required',
            'usuario'=>'required|unique:acudientes',
            'contraseña'=>'required|min:5'      
        ]);

        $acudiente = new Acudiente;

        $acudiente->nombre = $request->nombre;
        $acudiente->telefono = $request->telefono;
        $acudiente->usuario = $request->usuario;
        $contraseñahash = Hash::make($request->contraseña);
        $acudiente->contraseña = $contraseñahash;
        $save = $acudiente->save();

        

        if($save){
            return back()->with('success', 'Se ha registrado correctamente al acudiente');
        }else{
            return back()->with('fail', 'Algo salio mal');
        }
        
    }

    public function show_acudientes(){  #Funcion que muestra los acudientes registrados en la base de datos
        $acudientes = Acudiente::orderBy('id', 'asc')->paginate();

        return view('admin.acudientes', compact('acudientes'));
    }

    public function show_docentes(){  #Funcion que muestra los docentes registrados en la base de datos
        $docentes = Docentes::orderBy('id', 'asc')->paginate();

        return view('admin.docentes', compact('docentes'));
    }

    public function edit_acudiente(Acudiente $acudiente){  #Funcion que muestra el formulario para editar acudientes registrados
        return view('admin.edit_acudiente', compact('acudiente'));
    }

    public function update_acudiente(Request $request, Acudiente $acudiente){  #Funcion que actualiza los datos del acudiente que se edito
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'usuario' => 'required'
        ]);

        $acudiente->update($request->all());

        return redirect()->route('show.acudientes');
    }

    public function destroy_acudiente(Acudiente $acudiente){  #Funcion para eliminar acudientes 

        $acudiente->delete();

        return redirect()->route('show.acudientes');
    }

    public function edit_docente(Docentes $docente){  #Funcion que muestra el formulario para editar docentes registrados
        return view('admin.edit_docente', compact('docente'));
    }

    public function update_docente(Request $request, Docentes $docente){  #Funcion que actualiza los datos del docente que se edito
        $request->validate([
            'nombre' => 'required',
            'curso' => 'required',
            'usuario' => 'required'
        ]);

        $docente->update($request->all());

        return redirect()->route('show.docentes');
    }

    public function destroy_docente(Docentes $docente){  #Funcion para eliminar docentes
        
        $docente->delete();

        return redirect()->route('show.docentes');
    }



    function register_estudiante(){     #Funcion que se encarga de mostrar el formulario de registro de estudiantes
        return view('admin.register_estudiante');
     
    }

    function save_estudiante(Request $request){     #Funcion que se encarga de almacenar los estudiantes a registrar
        //validar request
        $request->validate([
            'nombre'=>'required',
            'curso'=>'required',
            'id_acudiente'=>'required'
            
        ]);

        $estudiante = new estudiante;

        $estudiante->nombre = $request->nombre;
        $estudiante->curso = $request->curso;
        $estudiante->id_acudiente = $request->id_acudiente;
        $save = $estudiante->save();

        if($save){
            return back()->with('success', 'Se ha registrado correctamente al docente');
        }else{
            return back()->with('fail', 'Algo salio mal');
        }
    }

    public function show_estudiantes(){     #Funcion que muestra los estudiantes registrados en la base de datos
        $estudiantes = Estudiante::orderBy('id', 'asc')->paginate();

        return view('admin.estudiantes', compact('estudiantes'));
    }

    public function edit_estudiante(Estudiante $estudiante){    #Funcion que muestra el formulario para editar estudiantes registrados
        return view('admin.edit_estudiante', compact('estudiante'));
    }

    public function update_estudiante(Request $request, Estudiante $estudiante){    #Funcion que actualiza los datos del estudiante que se edito
        $request->validate([
            'nombre' => 'required',
            'curso' => 'required',
            'id_acudiente' => 'required'
        ]);

        $estudiante->update($request->all());

        return redirect()->route('show.estudiantes');
    }

    public function destroy_estudiante(estudiante $estudiante){     #Funcion para eliminar acudientes 

        $estudiante->delete();

        return redirect()->route('show.estudiantes');
    }

}
