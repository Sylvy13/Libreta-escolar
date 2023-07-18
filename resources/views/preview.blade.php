@extends('layouts.plantilla')  <!--Creacion de la vista que veran los acudientes al iniciar sesion para escoger el estudiante a su cargo a revisar-->
@section('title', 'Preview')
@section('content')
<link rel="stylesheet" href="{{asset('css/style5.css')}}">

<div class="espacio">
<table>
    <thead>
        <th>Nombre</th>       
        <th></th>
    </thead>
    <tbody>
        <tr>
            <td>{{$LoggedUserInfo['nombre']}}</td>                                  
            <td><a href="{{route('auth.logout')}}">Cerrar sesion</a></td>
        </tr>
    </tbody>
</table>

    <h1>Libreta escolar</h1>
    <br>

    @php
        $usuario = $LoggedUserInfo['usuario']
    @endphp
    
    @if ($LoggedUserInfo['tipousuario'] == 'docente')
    <a href="{{route('actividades.create')}}">Nueva actividad</a>
    @endif

    <br>
    <h1>Estudiantes a su cargo</h1>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Curso</th>   
        </thead>
        <tbody>
            
                @foreach ($estudiantes as $estudiante)
                    @if ($estudiante->id_acudiente == $LoggedUserInfo['id'])
                        <tr>
                            <td><a href="{{route('anuncios.show.curso', $estudiante->curso)}}">{{$estudiante->nombre}}</a></td>
                            <td>{{$estudiante->curso}}</td>
                        </tr>
                    @endif
                 @endforeach
            
        </tbody>
 
</table>
</div>  
@endsection