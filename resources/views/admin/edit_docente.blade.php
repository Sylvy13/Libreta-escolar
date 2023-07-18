<!DOCTYPE html>     <!--Creacion de la vista con el formulario para editar un docente-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Docente</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="docente_edit">
        <div class="container">
            <div class="user signinBx">
                <div class="imegBx"><section class="fondo"></section></div>
                <div class="formBx"> 
                    <form action="{{route('admin.update_docente', $docente)}}" method="POST">   <!--Formulario de edicion de docentes-->
                        @csrf
                        @method('put')
                        <h1>Editar docente</h1>
                        <label>
                            <br>
                            Nombre:
                            <br>
                            <input type="text" name="nombre" value="{{old('nombre', $docente->nombre)}}">
                        </label>
                        @error('nombre')
                            <br>
                            <small>*{{$message}}</small>
                            <br>         
                        @enderror
                        <br>
                        <label>
                            <br>
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
                            <br>
                            Usuario:
                            <br>
                            <input name="usuario" value="{{old('usuario',$docente->usuario)}}">
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