<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheckDocente      #Creacion de la clase AuthCheckDocente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)     #Funcion que mantiene permite el acceso a rutas que requieren inicio de sesion por parte de los docentes
    {
        if(!session()->has('LoggedDocente') &&($request->path() !='auth/login' && $request->path() !='auth/register')){
            return redirect('auth/login')->with('fail', 'Debes iniciar sesion');
        }
        if(session()->has('LoggedDcente') && ($request->path() == 'auth/login' || $request->path() == 'auth/register')){
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');;
    }
}
