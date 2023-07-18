@extends('layouts.plantilla')   <!-- Creacion de la vista que muestra las entregas-->
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
     
    <h1>Actividad: {{$actividad['titulo']}}</h1>
    <table>     <!--Tabla para organizar las entregas-->
        <thead>
            <th>ID entrega</th>
            <th>Usuario</th>   
            <th>Descripcion</th>       
            <th>Archivo adjunto</th>  
            <th>Fecha de entrega</th> 
            <th>Calificacion</th> 
            <th></th>      
        </thead>

         <tbody>     
            @foreach ($entregas as $entrega)    <!--Muestra todas las entregas disponibles-->
                <tr>
                    @if ($entrega->id_actividad == $id)
                         
                        <td>{{$entrega->id}}</td>
                        <td>{{$entrega->usuario}}</td>
                        <td>{{$entrega->descripcion}}</td>
                        <td>
                            @if ($entrega->file_name)
                                <a href="{{route('entrega.download', $entrega->file_name)}}">Descargar archivo adjunto</a>
                             @endif 
                        </td>
                        <td>{{$entrega->created_at}}</td>
                         <form action="{{route('actividades.entrega.calificar', $entrega)}}" method="POST">
                            @csrf
                            @method('put')
                            <td>
                                <input name="calificacion" value="{{$entrega->calificacion}}">
                                @error('calificacion')
                                    <small>*{{$message}}</small>      
                                 @enderror
                            </td> 
                            <td>
                                <button type="submit">Calificar</button>
                            </td>
                        </form>  
                        @endif
                </tr>
            @endforeach
            
        </tbody>  
    </table>
</div>    
    
@endsection