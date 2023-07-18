@extends('layouts.plantilla')   <!--Creacion de la vista que muestra todos los docentes-->
@section('title', 'Registros')

@section('content')
<link rel="stylesheet" href="{{asset('css/style3.css')}}">

    <div class="titulo">
    <h2>Docentes</h2>
    <a href="{{route('admin')}}">Volver</a>  <!--Boton para volver al menu anterior-->
    <a href="{{route('admin.register_docente')}}">Registrar nuevo docente</a>   <!--Boton para el registro de un nuevo docente-->
    </div>
    <div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th> 
            <th>Curso</th>
            <th>Usuario</th>
            <th></th>
        </tr>
        @foreach ($docentes as $docente)    <!--Ciclo que muestra todos los docentes registrados-->
        <tr>
            <td>{{$docente->id}}</td>
            <td>{{$docente->nombre}}</td>
            <td>{{$docente->curso}}</td>
            <td>{{$docente->usuario}}</td>
            <td>
                <form action="{{route('admin.destroy_docente', $docente)}}" method="POST">
                @csrf
                 @method('delete')
                    <a href="{{route('admin.edit_docente',$docente)}}">Editar</a>
                    <button>Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
@endsection