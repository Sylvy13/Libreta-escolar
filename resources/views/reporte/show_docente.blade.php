@extends('layouts.plantilla')       <!--Creacion de la vista de como se vera el reporte de notas de un curso-->

@section('title', 'Reporte de notas')
@include('layouts.partials.header')
@section('content')
<div class="espacio">
<table>
    <thead>
        <th>Nombre</th>       
            <th>Curso</th>    
        <th></th>
    </thead>
    <tbody>
        <tr>
            <td>{{$LoggedUserInfo['nombre']}}</td>                         
                <td>{{$curso}}</td>           
            <td><a href="{{route('auth.logout')}}">Cerrar sesion</a></td>
        </tr>
    </tbody>
</table>

   <h1>Reporte de notas</h1>
   
    <table>     <!--Tabla con los nombres y calificaciones de cada estudiantes en las actividades publicadas-->
        <thead>
            <th>Nombre del estudiante</th>
            @foreach($actividades as $actividad)
                <th> Tarea: {{$actividad->titulo}}</th>
            @endforeach
        </thead>    
        <tbody>       
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
    <a href="{{route('reporte.generate.docente', [$curso])}}">Descargar reporte de notas</a>    <!--Boton para descargar el reporte en formato PDF-->
</div>
@endsection