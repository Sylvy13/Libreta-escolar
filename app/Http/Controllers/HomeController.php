<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller #Creacion de la clase HomeController
{
    public function __invoke()  #Funcion que muestra la vista de home
    {
        return view('home');
    }
}
