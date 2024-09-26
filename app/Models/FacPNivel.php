<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacPNivel extends Model
{
    use HasFactory;

    // Especificamos el nombre de la tabla
    protected $table = 'fac_p_nivel';

    // Definir si hay una clave primaria personalizada o compuesta
    protected $primaryKey = 'id';

    // Deshabilitar los timestamps de Laravel (ya que ya tienes un campo `last_update`)
    public $timestamps = false;

    // Los campos que pueden ser asignados de manera masiva
    protected $fillable = [
        'id_eps',
        'nivel',
        'nombre',
        'id_regimen',
        'last_update'
    ];
}
