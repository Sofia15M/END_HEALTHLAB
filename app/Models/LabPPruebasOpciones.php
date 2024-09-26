<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPPruebasOpciones extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_p_pruebas_opciones';

    // Definir los campos que son asignables
    protected $fillable = [
        'id_prueba',
        'opcion',
        'valor_ref_min_f',
        'valor_ref_max_f',
        'valor_ref_min_m',
        'valor_ref_max_m',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
