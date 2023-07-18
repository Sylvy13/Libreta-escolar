<!DOCTYPE html>     <!--Creacion de la vista con el formulario para editar un estudiante-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Estudiante</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="alumno_edit">
        <div class="container">
            <div class="user signinBx">
                <div class="imigBx"><section class="fondo"></section></div>
                <div class="formBx"> 
                    <form action="{{route('admin.update_estudiante', $estudiante)}}" method="POST"> <!--Formulario de edicion de estudiantes-->
                        @csrf
                        @method('put')
                        <h1>Editar alumno</h1>
                        <label>
                            Nombre:
                            <br>
                            <input type="text" name="nombre" value="{{old('nombre', $estudiante->nombre)}}">
                        </label>
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <label>
                            Curso:
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
                        <label>
                            Id de acudiente:
                            <br>
                            <input name="id_acudiente" value="{{old('id_acudiente',$estudiante->id_acudiente)}}">
                        </label>
                
                        @error('id_acudiente')
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