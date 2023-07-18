<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck  #Creacion de la clase AuthCheck 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)  #Funcion que mantiene permite el acceso a rutas que requieren inicio de sesion 
    {

        if($request->url() == 'auth/logindocente'){
            if(!session()->has('LoggedDocente') &&($request->path() !='auth/logindocente' && $request->path() !='auth/registerdocente')){
                return redirect('auth/logindocente')->with('fail', 'Debes iniciar sesion');
            }
            if(session()->has('LoggedDocente') && ($request->path() == 'auth/logindocente' || $request->path() == 'auth/registerdocente')){
                return back();
            }
        }

        if($request->url() == 'auth/loginacudiente'){
            if(!session()->has('LoggedAcudiente') &&($request->path() !='auth/loginacudiente' && $request->path() !='auth/registeracudiente')){
                return redirect('auth/loginacudiente')->with('fail', 'Debes iniciar sesion');
            }
            if(session()->has('LoggedAcudiente') && ($request->path() == 'auth/loginacudiente' || $request->path() == 'auth/registeracudiente')){
                return back();
            }
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');;
    }
}
