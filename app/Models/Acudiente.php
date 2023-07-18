<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model   #Creacion de la clase Acudiente
{
    protected $guarded = ['status']; 
    
    use HasFactory;
}
