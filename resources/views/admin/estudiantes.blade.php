@extends('layouts.plantilla')      <!--Creacion de la vista que muestra todos los estudiantes-->
@section('title', 'Registros')

@section('content')
<link rel="stylesheet" href="{{asset('css/style3.css')}}">

    <div class="titulo">
    <h2>Estudiantes</h2>
    <a href="{{route('admin')}}">Volver</a>     <!--Boton para volver al menu anterior-->
    <a href="{{route('admin.register_estudiante')}}">Registrar nuevo estudiante</a> <!--Boton para el registro de un nuevo estudiante-->
    </div>

    <div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Curso</th>
            <th>Id acudiente</th>
            <th></th>
        </tr>
        @foreach ($estudiantes as $estudiante)  <!--Ciclo que muestra todos los estudiantes registrados-->
            <tr>
                <td>{{$estudiante->id}}</td>
                <td>{{$estudiante->nombre}}</td>
                <td>{{$estudiante->curso}}</td>
                <td>{{$estudiante->id_acudiente}}</td>
                <td>
                    <form action="{{route('admin.destroy_estudiante', $estudiante)}}" method="POST">
                        @csrf
                        @method('delete')
                    <a href="{{route('admin.edit_estudiante',$estudiante)}}">Editar</a>
                    <button>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
@endsection