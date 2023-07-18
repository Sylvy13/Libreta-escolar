<!DOCTYPE html> <!--Creacion de la vista con el formulario para editar un acudiente-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Acudiente</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="acudiente_edit">
        <div class="container">
            <div class="user signinBx">
                <div class="imagBx"><section class="fondo"></section></div>
                <div class="formBx"> 
                    <form action="{{route('admin.update_acudiente', $acudiente)}}" method="POST">   <!--Formulario de edicion de acudientes-->
                        @csrf
                        @method('put')
                        <h1>Editar acudiente</h1>
                        <label>
                            Nombre:
                            <br>
                            <input type="text" name="nombre" value="{{old('nombre', $acudiente->nombre)}}">
                        </label>
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <label>
                            Telefono:
                            <br>
                            <textarea name="telefono"  rows="5">{{old('telefono', $acudiente->telefono)}}</textarea>
                        </label>
                
                        @error('telefono')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                
                        <br>
                        <label>
                            Usuario:
                            <br>
                            <input name="usuario" value="{{old('usuario',$acudiente->usuario)}}">
                        </label>
                
                        @error('usuario')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                
                        <br>
                        <br>
                        
                        <button type="submit">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>