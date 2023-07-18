<?php

namespace App\Http\Controllers;

use App\Models\actividad;
use App\Models\Acudiente;
use App\Models\entrega;
use App\Models\estudiante;
use App\Models\Docentes;
use Illuminate\Http\Request;

class ReporteController extends Controller      #Creacion de la clase ReporteController que contendra los metodos de los reportes--- Mario Portacio Aparicio
{
    public function show_docentes(string $curso){       #Funcion que crea y muestra el reporte de notas del curso del docente


           $acudientes = Acudiente::orderBy('id','asc')->get();
           $estudiantes = Estudiante::where('curso', '=', $curso)->orderBy('id','asc')->get();
           $actividades = actividad::where('curso', '=', $curso)->orderBy('id','asc')->get();
           $entregas = entrega::where('curso', '=', $curso)->orderBy('id_acudiente','asc')->get();
        

            $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 'curso'=>$curso];

        
        
        return view('reporte.show_docente', $data, compact('acudientes', 'estudiantes', 'actividades','entregas'));
    }

    public function show_acudiente(string $curso){      #Funcion que crea y muestra el reporte de notas del estudiante a cargo

   
           $acudientes = Acudiente::orderBy('id','asc')->get();
           $estudiantes = Estudiante::where('curso', '=', $curso)->orderBy('id','asc')->get();
           $actividades = actividad::where('curso', '=', $curso)->orderBy('id','asc')->get();
           $entregas = entrega::where('curso', '=', $curso)->orderBy('id_acudiente','asc')->get();


            $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'curso'=>$curso];

        
        
        return view('reporte.show_acudiente', $data, compact('acudientes', 'estudiantes', 'actividades','entregas'));
    }

    public function generatePDFdocente(string $curso){      #Funcion que permite generar un PDF con el reporte del curso del docente
        $acudientes = Acudiente::orderBy('id','asc')->get();
        $estudiantes = Estudiante::where('curso', '=', $curso)->orderBy('id','asc')->get();
        $actividades = actividad::where('curso', '=', $curso)->orderBy('id','asc')->get();
        $entregas = entrega::where('curso', '=', $curso)->orderBy('id_acudiente','asc')->get();


        $data = ['LoggedUserInfo'=>Docentes::where('id', '=', session('LoggedDocente'))->first(), 'curso'=>$curso];
        $pdf= app('dompdf.wrapper');
        $pdf->loadView('reporte.descarga_docente', $data ,compact('acudientes', 'estudiantes', 'actividades','entregas'));
        return $pdf->download('ReporteNotas.pdf');
    }

    public function generatePDFacudiente(string $curso){        #Funcion que permite generar un PDF con el reporte del estudiante a cargo
        $acudientes = Acudiente::orderBy('id','asc')->get();
        $estudiantes = Estudiante::where('curso', '=', $curso)->orderBy('id','asc')->get();
        $actividades = actividad::where('curso', '=', $curso)->orderBy('id','asc')->get();
        $entregas = entrega::where('curso', '=', $curso)->orderBy('id_acudiente','asc')->get();


        $data = ['LoggedUserInfo'=>Acudiente::where('id', '=', session('LoggedAcudiente'))->first(), 'curso'=>$curso];
        
        $pdf= app('dompdf.wrapper');
        $pdf->loadView('reporte.descarga_acudiente', $data ,compact('acudientes', 'estudiantes', 'actividades','entregas'));

        return $pdf->download('ReporteNotas.pdf');
    }
}
