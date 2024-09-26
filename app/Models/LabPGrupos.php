<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabPGrupos extends Model
{
    use HasFactory;

    // Definir la tabla
    protected $table = 'lab_p_grupos';

    // Definir los campos que son asignables
    protected $fillable = [
        'codigo',
        'nombre',
        'habilita',
        'last_update',
    ];

    // Habilitar timestamps si no estás utilizando el campo last_update
    public $timestamps = false;
}
