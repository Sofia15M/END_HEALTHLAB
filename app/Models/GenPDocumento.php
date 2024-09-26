<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenPDocumento extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'gen_p_documento';

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
        'nombre',
        'habilita',
        'last_update',
    ];

    // Alcance para filtrar documentos habilitados
    public function scopeHabilitados($query)
    {
        return $query->where('habilita', 1);
    }
}
