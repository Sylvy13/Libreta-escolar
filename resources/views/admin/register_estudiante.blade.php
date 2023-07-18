<!DOCTYPE html>     <!--Creacion de la vista con el formulario para registrar estudiantes-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Estudiante</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="alumno_registro">
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../css/Imagenes/yourname.jpg"></div>
                <div class="formBx"> 
                    <form action="{{route('admin.save_estudiante')}}" method="POST">    <!--Formulario para registro de estudiantes-->
                
                    @if (Session::get('success'))
                        {{Session::get('succes')}}
                    @endif
                    @if (Session::get('fail'))
                        {{Session::get('fail')}}
                    @endif
                    @csrf
                    <h2>Registrar Alumno</h2> 
                        <label>
                            Nombre
                            <br>
                            <input type="text" name="nombre" placeholder="Ingrese nombre" value="{{old('nombre')}}">
                        </label>
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <br>
                        
                        <label>
                            Curso
                            <br>
                            <select name="curso" id="curso">
                
                                <option value="preescolar">preescolar</option>
                                <option value="prejardin">prejardin</option>
                                <option value="jardin">jardin</option>
                                <option value="transicion">transicion</option>
                                <option value="primero">primero</option>
                                <option value="segundo">segundo</option>
                                <option value="tercero">tercero</option>
                                <option value="cuarto">cuarto</option>
                                <option value="quinto">quinto</option>
                
                            </select>
                        </label>
                        @error('curso')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <br>
                        <label>
                            ID acudiente
                            <br>
                            <input type="text" name="id_acudiente" placeholder="Ingrese ID del acudiente" value="{{old('id_acudiente')}}">
                        
                        </label>
                        @error('ID acudiente')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                
                        <br>
                        <br>
                
                        <button type="submit">Registrar</button>
                        <br>
                        <a href="{{route('show.estudiantes')}}">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>