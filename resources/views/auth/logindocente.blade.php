<!DOCTYPE html> <!--Creacion de la vista con el formulario de login para los docentes-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Docente</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="docente">
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../css/Imagenes/Teacheranime.jpg"></div>
                <div class="formBx"> 
                    <form action="{{route('auth.check_docente')}}" method="POST">   <!--Formulario de inicio de sesion-->
                        @if(Session::get('fail'))
                            {{ Session::get('fail')}}
                        @endif
                    
                        @csrf

                        <h2>Iniciar Sesión Docente</h2>
                            <label>
                                <input type="text" name="usuario" placeholder="Ingrese usuario" value="{{old('usuario')}}">
                            </label>
                            @error('usuario')
                                <br>
                                <small>*{{$message}}</small>
                                <br>         
                            @enderror

                            <label>
                                <input type="password" name="contraseña" placeholder="Ingrese contraseña">
                            </label>
                            @error('contraseña')
                                <br>
                                <small>*{{$message}}</small>
                                <br>         
                            @enderror
                            <br>
                            <br>
                    
                            <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>