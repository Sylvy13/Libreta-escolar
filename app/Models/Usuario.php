<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model     #Creacion de la clase Usuario
{
    protected $guarded = ['status']; 
    use HasFactory;
}
