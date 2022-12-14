<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = "persona";
    protected $fillable = ['id','nombre','apellido','estado','created_at','updated_at'];
    
    // Relaciones
    // 1 a *
    // 1 a 1
    // * a *

}
