<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoUsuario extends Model
{
    use HasFactory;

    protected $table = "model_has_permissions";
    protected $fillable = ['permission_id','model_type','model_id'];
    
    // Relaciones
    // 1 a *
    // 1 a 1
    // * a *

}
