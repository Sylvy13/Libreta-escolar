<!DOCTYPE html>     <!--Creacion de la vista con el formulario para registrar docentes-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Docente</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>
<body>
    <section class="docente_registro">
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx"><img src="../css/Imagenes/profesorgafas.jpg"></div>
                <div class="formBx"> 
                    <form action="{{route('admin.save_docente')}}" method="POST">       <!--Formulario de registro de docentes-->

                        @if (Session::get('success'))
                            {{Session::get('succes')}}
                        @endif
                        @if (Session::get('fail'))
                            {{Session::get('fail')}}
                        @endif
                        @csrf
                        <h2>Registrar Docente</h2>   
                            <label>
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
                                <input type="text" name="usuario" placeholder="Ingrese usuario" value="{{old('usuario')}}">
                            
                            </label>
                            @error('usuario')
                                <br>
                                <small>*{{$message}}</small>
                                <br>         
                            @enderror
                    
                            <br>
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
                            <a href="{{route('show.docentes')}}">Volver</a>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>
</html>