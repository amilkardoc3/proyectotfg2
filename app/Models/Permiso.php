<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = "permissions";
    protected $fillable = ['id','name','guard_name','created_at','updated_at'];
    
    // Relaciones
    // 1 a *
    // 1 a 1
    // * a *

}
