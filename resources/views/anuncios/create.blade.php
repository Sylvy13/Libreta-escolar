@extends('layouts.plantilla')       <!--Creacion de la vista con el formulario para crear anuncios-->
@section('title','Crear Anuncio')
@include('layouts.partials.header')
@section('content')
<link rel="stylesheet" href="{{asset('css/style5.css')}}">

<div class="espacio">
    <div class="content">
        <form action="{{route('anuncios.store', $curso)}}" method="POST">   <!--Formulario para crear anuncios-->
        @csrf
        <label>
            Titulo
            <br>
            <input type="text" name="titulo" value="{{old('name')}}">
        </label>
        <br>
        <br>
        <label>
            Contenido
            <br>
            <textarea name="body"  rows="5" >{{old('descripcion')}}</textarea>
        </label>
        <br>
        <br>
        <button type="submit">Enviar formulario</button>
        </form>
    </div>
</div>
@endsection