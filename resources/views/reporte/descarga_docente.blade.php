@extends('layouts.plantilla')   <!--Creacion de la vista de como se vera el reporte de notas de un curso en el PDF que se descarga-->
@section('content')
<link rel="stylesheet" href="{{asset('css/style5.css')}}">
<br>
<h1>Reporte de notas</h1>
<br>
<table>
    <thead>
        <th>Nombre del estudiante</th>
        @foreach($actividades as $actividad)
            <th>{{$actividad->titulo}}</th>
        @endforeach
    </thead>    
    <tbody>    
        <tr><td></td></tr>   
        @foreach ($estudiantes as $estudiante)
            <tr>
                <td>{{$estudiante->nombre}}</td>

                @foreach ($entregas as $entrega)
                    @if ($estudiante->id_acudiente == $entrega->id_acudiente)
                        <td>{{$entrega->calificacion}}</td>
                    @endif
                @endforeach                       
            </tr>
        @endforeach             
    </tbody>
</table>
<br>
@endsection