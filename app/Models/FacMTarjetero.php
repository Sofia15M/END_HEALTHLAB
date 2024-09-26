<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacMTarjetero extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'fac_m_tarjetero';

    // Clave primaria
    protected $primaryKey = 'id';

    // Si la clave primaria no es auto-incremental
    public $incrementing = false;

    // Si la clave primaria no es de tipo entero (si fuera varchar u otro tipo)
    protected $keyType = 'int';

    // Indica si el modelo tiene las columnas 'created_at' y 'updated_at'
    public $timestamps = false;

    // Si deseas controlar manualmente 'last_update', puedes usar esta propiedad
    const UPDATED_AT = 'last_update';

    // Asignación masiva (campos que se pueden asignar en un array)
    protected $fillable = [
        'id',
        'historia',
        'id_persona',
        'id_regimen',
        'id_eps',
        'id_nivel',
        'last_update'
    ];

    public function persona()
    {
        return $this->belongsTo(User::class, 'id_persona');
    }
}
