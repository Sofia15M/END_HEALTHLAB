<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenPListaOpcion extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'gen_p_listaopcion';

    // Clave primaria
    protected $primaryKey = 'id';

    // Si la clave primaria no es auto-incremental
    public $incrementing = false;

    // Tipo de la clave primaria
    protected $keyType = 'int';

    // Desactivar el manejo de timestamps por defecto
    public $timestamps = false;

    // Laravel actualizará automáticamente la columna 'last_update'
    const UPDATED_AT = 'last_update';

    // Asignación masiva: campos que pueden ser asignados mediante arrays u otros métodos
    protected $fillable = [
        'id',
        'variable',
        'descripcion',
        'valor',
        'nombre',
        'abreviacion',
        'habilita',
        'last_update'
    ];

    public function scopeHabilitados($query)
    {
        return $query->where('habilita', 1);
    }
}
