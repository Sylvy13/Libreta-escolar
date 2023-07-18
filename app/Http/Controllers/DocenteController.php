<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocenteController extends Controller  #Creacion de la clase DocenteController que contendra los metodos de la clase Docente
{
    public function anuncio(){  #Funcion que permite a los docentes realizar anuncios a su nombre
        return $this->hasMany(Anuncio::class);
    }
}
