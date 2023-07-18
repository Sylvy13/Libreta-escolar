<!DOCTYPE html>     <!--Creacion de la vista inicial de los administradores-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="{{asset('css/style4.css')}}">
</head>

<body>
    <h1 class="titulo">Registros</h1>
    <div class="container">
        <a href="{{route('show.acudientes')}}">     <!--Boton para acceder a los registros de los acudientes-->
        <div class="serviceBox">
            <div class="icon" style="--i:#ffb508">
                <ion-icon name="people-circle-outline"></ion-icon>
            </div>
            <div class="content">
                <h1>Tabla Acudientes</h1>
            </div>
        </div>
        </a> 
    
        <a href="{{route('show.docentes')}}">   <!--Boton para acceder a los registros de los docentes-->
        <div class="serviceBox">
            <div class="icon" style="--i:#fd6494">
                <ion-icon name="school-outline"></ion-icon>
            </div>
            <div class="content">
                <h1>Tabla Docentes</h1>
            </div>
        </div>
        </a>

        <a href="{{route('show.estudiantes')}}">    <!--Boton para acceder a los registros de los estudiantes-->
        <div class="serviceBox">
            <div class="icon" style="--i:#43f390">
                <ion-icon name="library-outline"></ion-icon>
            </div>
            <div class="content">
                <h1>Tabla Alumnos</h1>
            </div>
        </div>
        </a>

        <a href="{{route('auth.logout')}}">     <!--Boton para cerrar sesion-->
        <div class="serviceBox">
            <div class="icon" style="--i:#4eb7ff">
                <ion-icon name="exit-outline"></ion-icon>
            </div>
            <div class="content">
                <h1>Cerrar Sesión</h1>
            </div>
        </div>
        </a>

    </div>

  
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>