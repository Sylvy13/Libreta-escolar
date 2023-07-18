@extends('layouts.plantilla')       <!--Creacion de la vista donde aparecen todos los anuncios publicados en el curso-->
@section('title', 'Tablon de anuncios')
@include('layouts.partials.header')
@section('content')

    <div class="espacio">
        
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
        <br>
        <br>
        <h1>Tablon de anuncios</h1>
        <a href="{{route('anuncios.create', $curso)}}">Nuevo anuncio</a>    <!--Boton para crear un nuevo anuncio-->

        <table>
            <thead>
                <th>Titulo</th>
                <th>Creador</th>
                <th>Asunto</th>
                <th></th>
            </thead>
            @foreach ($anuncios as $anuncio)    <!--Ciclo que muestra todos los anuncios disponibles del curso-->
                @if ($anuncio->curso == $LoggedUserInfo['curso'] || $anuncio->curso == $curso)
                <tr>
                    <td><h3>{{$anuncio->titulo}}</h3></td>
                    <td><h3>{{$anuncio->usuario}}</h3></td>
                        <td><p>{{$anuncio->body}}</p></td>
                    @if ($LoggedUserInfo['usuario']== $anuncio->usuario)
                    <td> <a href="{{route('anuncios.destroy', [$anuncio, $curso])}}">Eliminar anuncio</a></td>
                    @else <td> </td> 
                    @endif
                </tr>
                @endif
        
            @endforeach
        </table>
    </div>

@endsection

