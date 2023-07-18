<!DOCTYPE html>     <!--Creacion de la vista inicial de la aplicacion-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <section>
        <div class="container">
            <header>    <!--Header con los botones que llevan a los inicios de sesion para cada tipo de usuario-->
                <a href="#" class="logo">Libreta Escolar</a>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="{{route('auth.login_docente')}}">Docente</a></li>
                    <li><a href="{{route('auth.login_acudiente')}}">Acudiente</a></li>
                    <li><a href="{{route('auth.login_admin')}}">Admin</a></li>
                </ul>
            </header>
            <div class="content">
                <h2>Libreta Escolar</h2>
                <p>Bienvenidos Acudientes y Docentes, les presentamos el proyecto Libreta Escolar, 
                    que busca mantener un orden entre las actividades y noticias correspondientes a 
                    los docentes y acudientes, brindando así un buen ambiente para el intercambio de 
                    información entre estos. ☺☻
                </p>
            </div>
            <div class="imgBx">
                <img src="../css/Imagenes/studentpng.png">
            </div>
            <ul class="sci">
                <li><a href="{{route('auth.login_docente')}}"><img src="../css/Imagenes/female.png" ></a></li>
                <li><a href="{{route('auth.login_acudiente')}}"><img src="../css/Imagenes/study.png" ></a></li>
                <li><a href="{{route('auth.login_admin')}}"><img src="../css/Imagenes/admin.png" ></a></li>
            </ul>
        </div>
    </section>
    
</body>
</html>


