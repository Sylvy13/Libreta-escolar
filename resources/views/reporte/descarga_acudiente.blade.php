<!DOCTYPE html>  <!--Creacion de la vista de como se vera el reporte de notas de un estudiante en el PDF que se descarga-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="{{asset('css/style5.css')}}">
    <br>
    <h1>Reporte de notas</h1>
    <br>
    <table>
        <thead>
            <th>Nombre del estudiante</th>
            @foreach($actividades as $actividad)
                <th>{{$actividad->titulo}}</th>
            @endforeach
        </thead>

        <tbody>
            <tr><td></td></tr>
            @foreach ($estudiantes as $estudiante)
                @if ($estudiante->id_acudiente == $LoggedUserInfo['id'])      
                    <tr>
                        <td>{{$estudiante->nombre}}</td>
                        @foreach ($entregas as $entrega)
                            @if ($entrega->id_acudiente == $LoggedUserInfo['id'])
                                <td>{{$entrega->calificacion}}</td>
                            @endif
                        @endforeach                   
                    </tr>
                @else
                @endif
            @endforeach          
        </tbody>
    </table>
</body>
</html>