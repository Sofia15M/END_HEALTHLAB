<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabMOrdenResultados extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_m_orden_resultados';

    // Definir los campos que son asignables
    protected $fillable = [
        'fecha',
        'id_orden',
        'id_procedimiento',
        'id_prueba',
        'id_pruebaopcion',
        'res_opcion',
        'res_numerico',
        'res_texto',
        'res_memo',
        'num_procesamientos',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
