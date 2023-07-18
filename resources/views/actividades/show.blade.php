@extends('layouts.plantilla')   <!-- Creacion de la vista que muestra las actividades-->
@section('title', 'Tablon de actividades')
@include('layouts.partials.header')
@section('content')

<div class="espacio">
    <h1>Tablon de actividades</h1>
    <br>
    <table>     <!--Muestra la informacion del usuario activo-->
        <thead>
            <th>Nombre</th>
            <th>Curso</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
                <td>{{$LoggedUserInfo['nombre']}}</td>
                <td>{{$LoggedUserInfo['curso']}}</td>
                <td><a href="{{route('auth.logout')}}">Cerrar sesion</a></td>
            </tr>
        </tbody>
    </table>
     
    @if (!session('LoggedAcudiente')) <!--Verifica que no sea una sesion de acudiente-->
    <br>
    <br>
        <a href="{{route('actividades.create', $curso)}}">Nueva actividad</a> <!--Boton para crear actividades -->
    @endif
    <br>
    <table>
        <thead>
            <th>Titulo</th>
            <th></th>
        </thead>
        @foreach ($actividades as $actividad)   <!--Muestra todas las actividades disponibles-->

            @if ($actividad->curso == $LoggedUserInfo['curso'] || $actividad->curso == $curso)
            <tr>
                <td><h2>{{$actividad->titulo}}</h2></td>
                <td><a href="{{route('actividades.ver', [$curso, $actividad->id])}}">Ver actividad</a></td>
            </tr>    
            @endif

        @endforeach
    </table>
</div>   
    
@endsection