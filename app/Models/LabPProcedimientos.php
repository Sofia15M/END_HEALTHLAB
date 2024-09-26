<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPProcedimientos extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_p_procedimientos';

    // Definir los campos que son asignables
    protected $fillable = [
        'id_cups',
        'id_grupo_laboratorio',
        'metodo',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
