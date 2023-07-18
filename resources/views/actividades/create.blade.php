@extends('layouts.plantilla')       <!--Creacion de la vista para la creacion de actividades-->
@section('title','Crear actividad')
@include('layouts.partials.header')
@section('content')
    
<link rel="stylesheet" href="{{asset('css/style5.css')}}">
<div class="espacio">
    <div class="content">    
    <form action="{{route('actividades.store', $curso)}}" method="POST" enctype="multipart/form-data"> <!--Creacion del formulario para la creacion de actividades-->
    @csrf
    <label>
        Titulo
        <br>
        <input type="text" name="titulo" value="{{old('titulo')}}">
    </label>
    <br>
    <label>
        <br>
        descripcion
        <br>
        <textarea name="descripcion"  rows="5" >{{old('descripcion')}}</textarea>
    </label>
    <br>
    <label>

        <input type="date" name="fecha_entrega" value="{{old('fecha_entrega')}}">
    </label>
    @error('fecha_entrega')
        <small>*{{$message}}</small>      
     @enderror
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