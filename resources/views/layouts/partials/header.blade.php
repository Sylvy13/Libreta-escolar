<link rel="stylesheet" href="{{asset('css/style5.css')}}"> <!--Creacion del header que se repetira en la mayoria de las vistas-->

    <section>
        <div class="container">
            <header>
                <a href="#" class="logo">Libreta Escolar</a>
                <ul>

                    <li><a href="{{route('anuncios.show.curso', $curso)}}" class="{{(request()->routeIs('anuncios.show.curso'))? 'active' : ''}}">Anuncios</a>                  
                    </li>
                    <li><a href="{{route('actividades.show', $curso)}}" class="{{(request()->routeIs('actividades.show'))? 'active' : ''}}">Actividades</a>                   
                    </li>
                    @if (!session('LoggedAcudiente'))
                    <li><a href="{{route('reporte.show.docentes', $curso)}}" class="{{(request()->routeIs('reporte.show.docentes'))? 'active' : ''}}">Notas</a>                   
                    </li>
                    
                    @else
                        <li><a href="{{route('reporte.show.acudiente', $curso)}}" class="{{(request()->routeIs('reporte.show.acudiente'))? 'active' : ''}}">Notas</a>                   
                        </li>
                    @endif

                    @if (session('LoggedAcudiente'))
                        <li><a href="{{route('acudientes.preview', $curso)}}" class="{{(request()->routeIs('acudientes.preview'))? 'active' : ''}}">Mis estudiantes</a> 
                        </li>
                    @endif      
                </ul>
            </header>
        </div>
    </section>