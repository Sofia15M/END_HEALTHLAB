<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacPProfesional extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'fac_p_profesional';

    // Clave primaria
    protected $primaryKey = 'id';

    // Si la clave primaria no es auto-incremental
    public $incrementing = false;

    // Indica si la clave primaria es de tipo entero
    protected $keyType = 'int';

    // No utilizar los timestamps por defecto de Laravel ('created_at' y 'updated_at')
    public $timestamps = false;

    // Laravel actualiza automáticamente la columna 'last_update'
    const UPDATED_AT = 'last_update';

    // Asignación masiva: campos que pueden ser asignados mediante arrays u otros métodos
    protected $fillable = [
        'id',
        'codigo',
        'id_persona',
        'registro_medico',
        'id_tipo_prof',
        'last_update'
    ];
}
