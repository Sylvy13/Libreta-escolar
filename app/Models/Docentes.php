<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docentes extends Model        #Creacion de la clase Docentes
{

    protected $guarded = ['status']; 
    
    use HasFactory;
}
