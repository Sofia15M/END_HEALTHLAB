<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Definir la tabla
    protected $table = 'users';

    // Definir los campos que son asignables
    protected $fillable = [
        'id_tipoid',
        'numeroid',
        'apellido1',
        'apellido2',
        'nombre1',
        'nombre2',
        'fechanac',
        'id_sexobiologico',
        'direccion',
        'tel_movil',
        'email',
        'created_at',
        'updated_at',
        'last_update',
    ];

    // Habilitar timestamps
    public $timestamps = false;
}
