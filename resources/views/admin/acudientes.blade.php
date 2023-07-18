@extends('layouts.plantilla')   <!--Creacion de la vista que muestra todos los acudientes-->
@section('title', 'Registros')

@section('content')
<link rel="stylesheet" href="{{asset('css/style3.css')}}">

    <div class="titulo">
    <h2>Acudientes</h2>
    <a href="{{route('admin')}}">Volver</a>     <!--Boton para volver al menu anterior-->
    <a href="{{route('admin.register_acudiente')}}">Registrar nuevo acudiente</a> <!--Boton para el registro de un nuevo acudiente-->
    </div>

    <div class="container">
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Usuario</th>
            <th></th>
        </tr>
        @foreach ($acudientes as $acudiente)    <!--Ciclo que muestra todos los acudientes registrados-->
        <div>
        <tr>
            <td>{{$acudiente->id}}</td>
            <td>{{$acudiente->nombre}}</td>
            <td>{{$acudiente->telefono}}</td>
            <td>{{$acudiente->usuario}}</td>
            <td>
                <form action="{{route('admin.destroy_acudiente', $acudiente)}}" method="POST">
                    @csrf
                    @method('delete')
                <a href="{{route('admin.edit_acudiente',$acudiente)}}">Editar</a>
                <button>Eliminar</button>
                </form>
            </td>
        </tr>
       </div>
        @endforeach
    </table>
    </div>
@endsection