@extends('layouts.plantilla')   <!-- Creacion de la vista que muestra una actividad especifica-->
@section('title', 'Actividad')
@include('layouts.partials.header')
@section('content')
<link rel="stylesheet" href="{{asset('css/style5.css')}}">

<div class="espacio">
<div class="contenido">
<table>     <!--Muestra la informacion del usuario activo-->
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

    <br>
    <h1>Actividad</h1>
    <br>
    
    @foreach ($actividades as $actividad)   <!--Revisa todas las actividades para encontrar la que coincide con el ID recibido-->
        
        @if ($actividad->curso == $curso && $actividad->id == $id)
            
            <h2>{{$actividad->titulo}}</h2>
            <p>{{$actividad->descripcion}}</p>
            <p>Fecha de entrega: {{$actividad->fecha_entrega}}</p>

            @if ($actividad->file_name)
                <a href="{{route('actividades.download', $actividad->file_name) }}">Descargar archivo adjunto</a>
            @endif

            @if (!session('LoggedAcudiente'))
                <a href="{{route('actividades.destroy',[$curso, $actividad])}}">Eliminar actividad</a> 
            @endif
        @endif

    @endforeach
    
    <br>
    
    @if (session('LoggedAcudiente'))        <!--Si la sesion es de un acudiente le dira si ya entrego o le dara la opcion de entregar la actividad-->
        @foreach($entregas as $entrega)
            @if ($entrega->id_acudiente == $LoggedUserInfo['id'] && $entrega->curso == $curso && $entrega->id_actividad == $id)
                <p>Usted ya entrego esta actividad</p>
            @endif
        @endforeach
        <a href="{{route('actividades.entrega.create', [$curso, $id])}}">Entregar actividad</a>
        @else 
            
            <a href="{{route('actividades.entrega.show', [$curso, $id])}}">Ver entregas</a>
    @endif
   </div>
   </div> 
    
@endsection