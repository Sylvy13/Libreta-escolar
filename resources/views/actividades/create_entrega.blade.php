@extends('layouts.plantilla')       <!--Creacion de la vista para la creacion de entregas-->  
@section('title','Crear actividad')
    
@section('content')
<link rel="stylesheet" href="{{asset('css/style5.css')}}">  
<div class="espacio">
    <div class="content">
    <form action="{{route('actividades.entrega.store', [$curso, $id])}}" method="POST" enctype="multipart/form-data">   <!--Creacion del formulario para la creacion de entregas-->
    @csrf
    
    <label>
        Descripcion
        <br>
        <textarea name="descripcion"  rows="5" >{{old('descripcion')}}</textarea>
    </label>
    <br> 
    <br>
        Archivo
        <br>
        <input type="file" name="file" id="chooseFile" >
        <br>
        <label for="chooseFile"></label>
    <br>
    <button type="submit">Enviar formulario</button>
</form>
</div>
</div>
@endsection