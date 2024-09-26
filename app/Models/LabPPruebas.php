<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPPruebas extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_p_pruebas';

    // Definir los campos que son asignables
    protected $fillable = [
        'id_procedimiento',
        'codigo_prueba',
        'nombre_prueba',
        'id_tipo_resultado',
        'unidad',
        'habilita',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
