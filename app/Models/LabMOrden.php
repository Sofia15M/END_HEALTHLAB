<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabMOrden extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_m_orden';

    // Definir los campos que son asignables
    protected $fillable = [
        'id_documento',
        'orden',
        'fecha',
        'id_historia',
        'id_profesional_ordena',
        'profesional_externo',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
