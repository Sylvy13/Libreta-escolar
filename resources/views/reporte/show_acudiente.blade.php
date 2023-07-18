@extends('layouts.plantilla')   <!--Creacion de la vista de como se vera el reporte de notas de un estudiante-->
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
</table>    <!--Tabla con las notas del estudiante a cargo en cada una de las actividades publicadas-->
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
        
            @foreach ($estudiantes as $estudiante)
                @if ($estudiante->id_acudiente == $LoggedUserInfo['id'])      
                    <tr>
                        <td>{{$estudiante->nombre}}</td>
                        @foreach ($entregas as $entrega)
                            @if ($entrega->id_acudiente == $LoggedUserInfo['id'])
                                <td>{{$entrega->calificacion}}</td>
                            @endif
                        @endforeach                   
                    </tr>          
                @endif
            @endforeach          
        </tbody>
    </table>
    <br>
    <a href="{{route('reporte.generate.acudiente', [$curso])}}">Descargar reporte de notas</a>  <!--Boton para descargar el reporte en formato PDF-->
</div>
@endsection