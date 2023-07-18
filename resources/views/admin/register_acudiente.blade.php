<!DOCTYPE html> <!--Creacion de la vista con el formulario para registrar acudientes-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Acudiente</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="acudiente_registro">
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../css/Imagenes/mamaregistro.jpg"></div>
                <div class="formBx"> 
                    <form action="{{route('admin.save_acudiente')}}" method="POST"> <!--Formulario de registro de acudientes-->
                
                    @if (Session::get('success'))
                        {{Session::get('succes')}}
                    @endif
                    @if (Session::get('fail'))
                        {{Session::get('fail')}}
                    @endif
                    @csrf
                    <h2>Registrar Acudiente</h2>
                        <label>
                            <input type="text" name="nombre" placeholder="Ingrese nombre" value="{{old('nombre')}}">
                        </label>
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        
                        <label>
                            <input type="text" name="telefono" placeholder="Ingrese telefono" value="{{old('telefono')}}">
                        </label>
                        @error('curso')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <label>
                            <input type="text" name="usuario" placeholder="Ingrese usuario" value="{{old('usuario')}}">
                        
                        </label>
                        @error('usuario')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                
                        <br>
                        <label>
                            <input type="password" name="contraseña" placeholder="Ingrese contraseña" >
                        </label>
                        @error('contraseña')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                
                        <br>
                        <br>
                
                        <button type="submit">Registrar</button>
                        <br>
                        <a href="{{route('show.acudientes')}}">Volver a acudientes</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>